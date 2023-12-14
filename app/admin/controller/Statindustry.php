<?php

namespace app\admin\controller;
use think\facade\View;
use think\facade\Lang;
use think\facade\Db;
/**
 * ============================================================================
 * DSMall多用户商城
 * ============================================================================
 * 版权所有 2014-2028 长沙德尚网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.csdeshang.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 控制器
 */
class Statindustry extends AdminControl
{
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        include_once root_path(). 'extend/mall/statistics.php';
        include_once root_path(). 'extend/mall/datehelper.php';
        Lang::load(base_path() . 'admin/lang/'.config('lang.default_lang').'/stat.lang.php');

        $stat_model = model('stat');
        //存储参数
        $this->search_arr = input('param.');
        //处理搜索时间
        if (in_array(request()->action(),array('scale','rank','price'))){
            $this->search_arr = $stat_model->dealwithSearchTime($this->search_arr);
            //获得系统年份
            $year_arr = getSystemYearArr();
            //获得系统月份
            $month_arr = getSystemMonthArr();
            //获得本月的周时间段
            $week_arr = getMonthWeekArr($this->search_arr['week']['current_year'], $this->search_arr['week']['current_month']);
            View::assign('year_arr', $year_arr);
            View::assign('month_arr', $month_arr);
            View::assign('week_arr', $week_arr);
        }
        View::assign('search_arr', $this->search_arr);
        /**
         * 处理商品分类
         */
        $show_depth = 3;//select需要展示的深度
        if (in_array(request()->action(),array('scale','general'))){//仅显示前两级分类
            $show_depth = 2;
        }
        $gcid=input('param.choose_gcid');
        $this->choose_gcid = $gcid >0 ? $gcid : 0;
        $gccache_arr = model('goodsclass')->getGoodsclassCache($this->choose_gcid,$show_depth);
        $this->gc_arr = $gccache_arr['showclass'];
        View::assign('gc_json',json_encode($gccache_arr['showclass']));
        View::assign('gc_choose_json',json_encode($gccache_arr['choose_gcid']));
    }
    /**
     * 行业规模
     */
    public function scale(){
        if(!isset($this->search_arr['search_type'])){
            $this->search_arr['search_type'] = 'day';
        }
        $stat_model = model('stat');
        //获得搜索的开始时间和结束时间
        $searchtime_arr = $stat_model->getStarttimeAndEndtime($this->search_arr);
        View::assign('searchtime',implode('|',$searchtime_arr));
        $this->setAdminCurItem('scale');
        return View::fetch();
    }
    /**
     * 行业规模列表
     */
    public function scale_list(){
        //获得子分类ID
        $gc_childid = $gc_childarr = array();
        if (input('param.choose_gcid') > 0){//如果进行了分类搜索，则统计该分类下的子分类
            $gc_childdepth = $this->gc_arr[input('param.choose_gcid')]['depth'] + 1;
            $gc_childid = explode(',',$this->gc_arr[input('param.choose_gcid')]['child']);
            if ($gc_childid){
                foreach ((array)$this->gc_arr as $k=>$v){
                    if (in_array($v['gc_id'],$gc_childid)){
                        $gc_childarr[$v['gc_id']] = $v;
                    }
                }
            }
        } else {//如果没有搜索分类，则默认统计一级分类
            $gc_childdepth = 1;
            foreach ((array)$this->gc_arr as $k=>$v){
                if ($v['depth'] == 1){
                    $gc_childarr[$v['gc_id']] = $v;
                }
            }
        }
        if($gc_childarr){
            $stat_model = model('stat');
            $stat_list = array();
            //构造横轴数据
            foreach($gc_childarr as $k=>$v){
                $stat_list[$k]['gc_name'] = $v['gc_name'];
                $stat_list[$k]['y'] = 0;
            }
            $where = array();
            $where[] = array('order_isvalid','=',1);//计入统计的有效订单
            $searchtime_arr_tmp = explode('|',input('param.t'));
            foreach ((array)$searchtime_arr_tmp as $k=>$v){
                $searchtime_arr[] = intval($v);
            }
            $where[] = array('order_add_time','between',$searchtime_arr);
            if ($this->choose_gcid > 0){
                $where[] = array('gc_parentid_'.($gc_childdepth-1),'=',$this->choose_gcid);
            }
            $field = 'gc_parentid_'.$gc_childdepth.' as statgc_id';
            $stattype = input('param.stattype');
            
            switch ($stattype){
                case 'ordernum':
                    $caption = lang('statstore_ordernum');
                    $field .= ',COUNT(DISTINCT order_id) as ordernum';
                    $orderby = 'ordernum desc';
                    break;
                case 'goodsnum':
                    $caption = lang('goodsnum');
                    $field .= ',SUM(goods_num) as goodsnum';
                    $orderby = 'goodsnum desc';
                    break;
                default:
                    $stattype = 'orderamount';
                    $caption = lang('statstore_orderamount');
                    $field .= ',SUM(goods_pay_price) as orderamount';
                    $orderby = 'orderamount desc';
                    break;
            }
            $orderby .= ',statgc_id asc';

            $goods_list = $stat_model->statByStatordergoods($where, $field, 0, 0, $orderby, 'statgc_id');
            foreach ((array)$goods_list as $k=>$v){
                $statgc_id = intval($v['statgc_id']);
                if (in_array($statgc_id,array_keys($gc_childarr))){
                    $stat_list[$statgc_id]['gc_name'] = strval($gc_childarr[$v['statgc_id']]['gc_name']);
                } else {
                    $stat_list[$statgc_id]['gc_name'] = lang('other');
                }
                switch ($stattype){
                    case 'orderamount':
                        $stat_list[$statgc_id]['y'] = floatval($v[$stattype]);
                        break;
                    default:
                        $stat_list[$statgc_id]['y'] = intval($v[$stattype]);
                        break;
                }
            }
            //构造横轴数据
            foreach($stat_list as $k=>$v){
                //数据
                $stat_arr['series'][0]['data'][] = array('name'=>strval($v['gc_name']),'y'=>$v['y']);
                //横轴
                $stat_arr['xAxis']['categories'][] = strval($v['gc_name']);
            }
            //得到统计图数据
            $stat_arr['series'][0]['name'] = $caption;
            $stat_arr['title'] = sprintf(lang('industry_statis'),$caption);
            $stat_arr['legend']['enabled'] = false;
            $stat_arr['yAxis']['title']['text'] = $caption;
            $stat_arr['yAxis']['title']['align'] = 'high';
            $statjson = getStatData_Basicbar($stat_arr);
            View::assign('stat_json',$statjson);
            View::assign('stattype',$stattype);
            echo View::fetch('stat_linelabels');
        }
    }
    /**
     * 行业排行
     */
    public function rank(){
        if(!isset($this->search_arr['search_type'])){
            $this->search_arr['search_type'] = 'day';
        }
        $stat_model = model('stat');
        //获得搜索的开始时间和结束时间
        $searchtime_arr = $stat_model->getStarttimeAndEndtime($this->search_arr);
        $where = array();
        $where[] = array('order_isvalid','=',1);//计入统计的有效订单
        $where[] = array('order_add_time','between',$searchtime_arr);
        if ($this->choose_gcid > 0){
            $gc_id_depth = $this->gc_arr[$this->choose_gcid]['depth'];
            $where[] = array('gc_parentid_'.$gc_id_depth,'=',$this->choose_gcid);
        }
        /**
         * 商品排行
         */
        $goods_stat_arr = array();
        //构造横轴数据
        for($i=1; $i<=50; $i++){
            //数据
            $goods_stat_arr['series'][0]['data'][] = array('name'=>'','y'=>0);
            //横轴
            $goods_stat_arr['xAxis']['categories'][] = "$i";
        }
        $field = 'goods_id,goods_name,SUM(goods_num) as goodsnum';
        $goods_list = $stat_model->statByStatordergoods($where, $field, 0, 50, 'goodsnum desc,goods_id asc', 'goods_id');
        foreach ((array)$goods_list as $k=>$v){
            $goods_stat_arr['series'][0]['data'][$k] = array('name'=>strval($v['goods_name']),'y'=>floatval($v['goodsnum']));
        }
        //得到统计图数据
        $goods_stat_arr['series'][0]['name'] = lang('goodsnum');
        $goods_stat_arr['title'] = lang('statindustry_top_50');
        $goods_stat_arr['legend']['enabled'] = false;
        $goods_stat_arr['yAxis'] = lang('goodsnum');
        $goods_statjson = getStatData_Column2D($goods_stat_arr);
        /**
         * 店铺排行
         */
        $store_stat_arr = array();
        //构造横轴数据
        for($i=1; $i<=30; $i++){
            //数据
            $store_stat_arr['series'][0]['data'][] = array('name'=>'','y'=>0);
            //横轴
            $store_stat_arr['xAxis']['categories'][] = "$i";
        }
        $field = 'store_id,store_name,COUNT(DISTINCT order_id) as ordernum';
        $store_list = $stat_model->statByStatordergoods($where, $field, 0, 30, 'ordernum desc,store_id asc', 'store_id');
        foreach ((array)$store_list as $k=>$v){
            $store_stat_arr['series'][0]['data'][$k] = array('name'=>strval($v['store_name']),'y'=>floatval($v['ordernum']));
        }
        //得到统计图数据
        $store_stat_arr['series'][0]['name'] = lang('statstore_ordernum');
        $store_stat_arr['title'] = lang('statindustry_top_30');
        $store_stat_arr['legend']['enabled'] = false;
        $store_stat_arr['yAxis'] = lang('statstore_ordernum');
        $store_statjson = getStatData_Column2D($store_stat_arr);

        View::assign('goods_statjson',$goods_statjson);
        View::assign('goods_list',$goods_list);
        View::assign('store_statjson',$store_statjson);
        View::assign('store_list',$store_list);
        $this->setAdminCurItem('rank');
        return View::fetch();
    }
    /**
     * 价格分布
     */
    public function price(){
        if(!isset($this->search_arr['search_type'])){
            $this->search_arr['search_type'] = 'day';
        }
        $stat_model = model('stat');
        //获得搜索的开始时间和结束时间
        $searchtime_arr = $stat_model->getStarttimeAndEndtime($this->search_arr);
        $where = array();
        $where[] = array('order_isvalid','=',1);//计入统计的有效订单
        $where[] = array('order_add_time','between',$searchtime_arr);
        if ($this->choose_gcid > 0){
            $gc_id_depth = $this->gc_arr[$this->choose_gcid]['depth'];
            $where[] = array('gc_parentid_'.$gc_id_depth,'=',$this->choose_gcid);
        }

$field='1';
        $pricerange_arr = ($t = trim(config('ds_config.stat_orderpricerange')))?unserialize($t):'';

        if ($pricerange_arr){
            $goodsnum_stat_arr['series'][0]['name'] = lang('goodsnum');
            $orderamount_stat_arr['series'][0]['name'] = lang('statstore_orderamount');
            //设置价格区间最后一项，最后一项只有开始值没有结束值
            $pricerange_count = count($pricerange_arr);
            if ($pricerange_arr[$pricerange_count-1]['e']){
                $pricerange_arr[$pricerange_count]['s'] = $pricerange_arr[$pricerange_count-1]['e'] + 1;
                $pricerange_arr[$pricerange_count]['e'] = '';
            }
        
            foreach ((array)$pricerange_arr as $k=>$v){
                $v['s'] = intval($v['s']);
                $v['e'] = intval($v['e']);
                //构造查询字段
               if ($v['e']){
                    $field .= ",SUM(IF(goods_pay_price/goods_num > {$v['s']} and goods_pay_price/goods_num <= {$v['e']},goods_num,0)) as goodsnum_{$k}";
                    $field .= " ,SUM(IF(goods_pay_price/goods_num > {$v['s']} and goods_pay_price/goods_num <= {$v['e']},goods_pay_price,0)) as orderamount_{$k}";
                } else {//由于最后一个区间没有结束值，所以需要单独构造sql
                    $field .= ",SUM(IF(goods_pay_price/goods_num > {$v['s']},goods_num,0)) as goodsnum_{$k}";
                    $field .= " ,SUM(IF(goods_pay_price/goods_num > {$v['s']},goods_pay_price,0)) as orderamount_{$k}";
                }
            }

            $ordergooods_list = Db::query('SELECT '.$field.' FROM '.config('database.connections.mysql.prefix').'statordergoods WHERE order_isvalid=1 AND order_add_time BETWEEN '.$searchtime_arr[0].' AND '.$searchtime_arr[1].($this->choose_gcid > 0?(' AND gc_parentid_'.$gc_id_depth.'='.$this->choose_gcid):''));
            if($ordergooods_list){
                $ordergooods_list= current($ordergooods_list);
                foreach ((array)$pricerange_arr as $k=>$v){
                    //横轴
                    if($v['e']){
                        $goodsnum_stat_arr['xAxis']['categories'][] = $v['s'].'-'.$v['e'];
                        $orderamount_stat_arr['xAxis']['categories'][] = $v['s'].'-'.$v['e'];
                    } else {
                        $goodsnum_stat_arr['xAxis']['categories'][] = $v['s'].lang('above');
                        $orderamount_stat_arr['xAxis']['categories'][] = $v['s'].lang('above');
                    }
                    //统计图数据
                    $goodsnum_stat_arr['series'][0]['data'][$k] = 0;
                    $orderamount_stat_arr['series'][0]['data'][$k] = 0;
                    if (isset($ordergooods_list['goodsnum_'.$k])){
                        $goodsnum_stat_arr['series'][0]['data'][$k] = intval($ordergooods_list['goodsnum_'.$k]);
                    }
                    if (isset($ordergooods_list['orderamount_'.$k])){
                        $orderamount_stat_arr['series'][0]['data'][$k] = intval($ordergooods_list['orderamount_'.$k]);
                    }
                }
            }
            //得到统计图数据
            $goodsnum_stat_arr['legend']['enabled'] = false;
            $goodsnum_stat_arr['title'] = lang('industry_goods_number');
            $goodsnum_stat_arr['yAxis'] = '';

            $orderamount_stat_arr['legend']['enabled'] = false;
            $orderamount_stat_arr['title'] = lang('industry_order_amount');
            $orderamount_stat_arr['yAxis'] = '';
            $goodsnum_stat_json = getStatData_LineLabels($goodsnum_stat_arr);
            $orderamount_stat_json = getStatData_LineLabels($orderamount_stat_arr);
        } else {
            $goodsnum_stat_json = '';
            $orderamount_stat_json = '';
        }

        View::assign('goodsnum_stat_json',$goodsnum_stat_json);
        View::assign('orderamount_stat_json',$orderamount_stat_json);
        $this->setAdminCurItem('price');
        return View::fetch();
    }

    /**
     * 销售统计
     */
    public function general(){
        $this->setAdminCurItem('general');
        return View::fetch();
    }

    /**
     * 概况总览
     */
    public function general_list(){
        $ordergoods_list=array();
        //获得子分类ID
        $gc_childid = $gc_childarr = array();
        if ($this->choose_gcid > 0){
            $gc_childdepth = $this->gc_arr[$this->choose_gcid]['depth'] + 1;
            $gc_childid = explode(',',$this->gc_arr[$this->choose_gcid]['child']);
            if ($gc_childid){
                foreach ((array)$this->gc_arr as $k=>$v){
                    if (in_array($v['gc_id'],$gc_childid)){
                        $gc_childarr[$v['gc_id']] = $v;
                    }
                }
            }
        } else {//如果没有搜索分类，则默认统计一级分类
            $gc_childdepth = 1;
            foreach ((array)$this->gc_arr as $k=>$v){
                if ($v['depth'] == 1){
                    $gc_childarr[$v['gc_id']] = $v;
                }
            }
        }

        $statlist = array();

        if ($gc_childarr){
            $stat_model = model('stat');
            //查询订单商品信息
            $where = array();
            $where[] = array('order_isvalid','=',1);//计入统计的有效订单
            //计算开始时间和结束时间
            $searchtime_arr[1] = strtotime(date('Y-m-d',TIMESTAMP)) - 1;//昨天23:59点
            $searchtime_arr[0] = $searchtime_arr[1] - (86400 * 30) + 1; //从昨天开始30天前
            $where[] = array('order_add_time','between',$searchtime_arr);
            //halt($this->choose_gcid);
            if ($this->choose_gcid > 0){
                $where[] = array('gc_parentid_'.($gc_childdepth-1),'=',$this->choose_gcid);
            }

            $field = 'gc_parentid_'.$gc_childdepth.' as statgc_id,COUNT(DISTINCT goods_id) as ordergcount,SUM(goods_num) as ordergnum,SUM(goods_pay_price) as orderamount';
            
            $ordergoods_list_tmp = $stat_model->statByStatordergoods($where, $field, 0, 0, '', 'gc_parentid_'.$gc_childdepth);

            foreach ((array)$ordergoods_list_tmp as $k=>$v){
                $ordergoods_list[$v['statgc_id']] = $v;
            }
            
            //查询商品信息
            $field = 'gc_id_'.$gc_childdepth.' as statgc_id,COUNT(*) as goodscount,AVG(goods_price) as priceavg';
            $goods_list_tmp = $stat_model->statByGoods(array('is_virtual'=>0), $field, 0, 0, '', 'gc_id_'.$gc_childdepth);

            foreach ((array)$goods_list_tmp as $k=>$v){
                $goods_list[$v['statgc_id']] = $v;
            }
            //将订单和商品数组合并
            $statlist_tmp = array();
            foreach ($gc_childarr as $k=>$v){
                $tmp = array();
                $tmp['statgc_id'] = $v['gc_id'];
                $tmp['gc_name'] = $v['gc_name'];
                $tmp['ordergcount'] = isset($ordergoods_list[$v['gc_id']]['ordergcount'])?$ordergoods_list[$v['gc_id']]['ordergcount']:0;
                $tmp['ordergnum'] = isset($ordergoods_list[$v['gc_id']]['ordergnum'])?$ordergoods_list[$v['gc_id']]['ordergnum']:0;
                $tmp['orderamount'] = isset($ordergoods_list[$v['gc_id']]['orderamount'])?$ordergoods_list[$v['gc_id']]['orderamount']:0;
                $tmp['goodscount'] = isset($goods_list[$v['gc_id']]['goodscount'])?$goods_list[$v['gc_id']]['goodscount']:0;
                $tmp['priceavg'] = ds_price_format(isset($goods_list[$v['gc_id']]['priceavg'])?$goods_list[$v['gc_id']]['priceavg']:0);
                $tmp['unordergcount'] = intval($tmp['goodscount']) - intval($tmp['ordergcount']);//计算无销量商品数
                $statlist_tmp[]= $tmp;
            }
            $statlist = array();
            //整理排序
            $orderby = isset($this->search_arr['orderby'])?trim($this->search_arr['orderby']):'';
            if (!$orderby){
                $orderby = 'orderamount desc';
            }
            $orderkeys = explode(' ',$orderby);
            $keysvalue = $new_array = array();
            foreach ($statlist_tmp as $k=>$v){
                $keysvalue[$k] = $v[$orderkeys[0]];
            }
            if($orderkeys[1] == 'asc'){
                asort($keysvalue);
            }else{
                arsort($keysvalue);
            }
            reset($keysvalue);
            foreach ($keysvalue as $k=>$v){
                $statlist[$k] = $statlist_tmp[$k];
            }
            //导出Excel
            if (isset($this->search_arr['exporttype']) && $this->search_arr['exporttype'] == 'excel'){
                //列表header
                $statheader = array();
                $statheader[] = array('text'=>lang('ds_goodsclass'),'key'=>'gc_name');
                $statheader[] = array('text'=>lang('average_price').'（'.lang('ds_yuan').'）','key'=>'priceavg','isorder'=>1);
                $statheader[] = array('text'=>lang('have_sale_goods_number'),'key'=>'ordergcount','isorder'=>1);
                $statheader[] = array('text'=>lang('ds_order_sn'),'key'=>'ordergnum','isorder'=>1);
                $statheader[] = array('text'=>lang('stattrade_order_amount').'（'.lang('ds_yuan').'）','key'=>'orderamount','isorder'=>1);
                $statheader[] = array('text'=>lang('industry_goods_total'),'key'=>'goodscount','isorder'=>1);
                $statheader[] = array('text'=>lang('no_sale_goods_number'),'key'=>'unordergcount','isorder'=>1);
                //导出Excel
                $excel_obj = new \excel\Excel();
                $excel_data = array();
                //设置样式
                $excel_obj->setStyle(array('id'=>'s_title','Font'=>array('FontName'=>'宋体','Size'=>'12','Bold'=>'1')));
                //header
                foreach ($statheader as $k=>$v){
                    $excel_data[0][] = array('styleid'=>'s_title','data'=>$v['text']);
                }
                //data
                foreach ($statlist as $k=>$v){
                    foreach ($statheader as $h_k=>$h_v){
                        $excel_data[$k+1][] = array('data'=>$v[$h_v['key']]);
                    }
                }
                $excel_data = $excel_obj->charset($excel_data,CHARSET);
                $excel_obj->addArray($excel_data);
                $excel_obj->addWorksheet($excel_obj->charset(lang('industry_state_view'),CHARSET));
                $excel_obj->generateXML($excel_obj->charset(lang('industry_state_view'),CHARSET).date('Y-m-d-H',TIMESTAMP));
                exit();
            }
        }
        //列表header
        $statheader = array();
        $statheader[] = array('text'=>lang('ds_goodsclass'),'key'=>'gc_name');
        $statheader[] = array('text'=>'<span title="'.lang('goods_class_average_goods_price').'" class="tip iconfont">&#xe71c;</span>&nbsp;'.lang('average_price').'（'.lang('ds_yuan').'）','key'=>'priceavg','isorder'=>1);
        $statheader[] = array('text'=>'<span title="'.lang('have_sale_goods_number_recent').'" class="tip iconfont">&#xe71c;</span>&nbsp;'.lang('have_sale_goods_number'),'key'=>'ordergcount','isorder'=>1);
        $statheader[] = array('text'=>'<span title="'.lang('industry_goods_total_recent').'" class="tip iconfont">&#xe71c;</span>&nbsp;'.lang('ds_order_sn'),'key'=>'ordergnum','isorder'=>1);
        $statheader[] = array('text'=>'<span title="'.lang('have_sale_goods_amount_recent').'" class="tip iconfont">&#xe71c;</span>&nbsp;'.lang('stattrade_order_amount').'（'.lang('ds_yuan').'）','key'=>'orderamount','isorder'=>1);
        $statheader[] = array('text'=>'<span title="'.lang('goods_class_goods_number').'" class="tip iconfont">&#xe71c;</span>&nbsp;'.lang('industry_goods_total'),'key'=>'goodscount','isorder'=>1);
        $statheader[] = array('text'=>'<span title="'.lang('have_sale_goods_number_recent').'" class="tip iconfont">&#xe71c;</span>&nbsp;'.lang('no_sale_goods_number'),'key'=>'unordergcount','isorder'=>1);
        View::assign('statheader',$statheader);
        View::assign('statlist',$statlist);
        View::assign('orderby',$orderby);
        View::assign('actionurl',(string)url('Statindustry'.'/'.request()->action(),['choose_gcid'=>$this->choose_gcid]));
        echo View::fetch('listandorder');exit;
    }

    protected function getAdminItemList()
    {
        $menu_array = array(
            array(
                'name' => 'scale', 'text' => lang('stat_industryscale'), 'url' => (string)url('Statindustry/scale')
            ), array(
                'name' => 'rank', 'text' => lang('stat_industryrank'), 'url' => (string)url('Statindustry/rank')
            ), array(
                'name' => 'price', 'text' => lang('stat_industryprice'), 'url' => (string)url('Statindustry/price')
            ),array(
                'name' => 'general', 'text' => lang('stat_industrygeneral'), 'url' => (string)url('Statindustry/general')
            )
        );
        return $menu_array;
    }
}