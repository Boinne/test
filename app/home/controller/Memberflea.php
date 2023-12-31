<?php

namespace app\home\controller;

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
class Memberflea extends BaseFleaMember {

    public function initialize() {
        parent::initialize(); // TODO: Change the autogenerated stub
        Lang::load(base_path() . 'home/lang/' . config('lang.default_lang') . '/fleacommon.lang.php');
        Lang::load(base_path() . 'home/lang/' . config('lang.default_lang') . '/memberflea.lang.php');
    }

    /**
     * 默认显示闲置列表
     */
    public function index() {
        /**
         * 实例化闲置物品模型
         */
        $flea_model = model('flea');

        $special_condition['member_id'] = session('member_id');
        $special_condition['keyword'] = addslashes(trim(input('keyword')));
        $special_condition['order'] = 'goods_id desc';
        $list_goods = $flea_model->getFleaList($special_condition, 10, '*', 'goods_id desc', 14);
        if (is_array($list_goods) and ! empty($list_goods)) {
            foreach ($list_goods as $key => $val) {
                $list_goods[$key]['goods_image'] = $list_goods[$key]['goods_image'] == '' ? '' : ds_get_pic( ATTACH_MFLEA . '/' . session('member_id') , str_replace('_1024', '_240', $val['goods_image']));
            }
        }
        View::assign('show_page', $flea_model->page_info->render());
        View::assign('list_goods', $list_goods);

        //查询会员信息
        $this->member_info = $this->getMemberAndGradeInfo(true);
        View::assign('menu_sign', 'flea');
        View::assign('menu_sign_url', (string) url('Memberflea/index'));
        View::assign('menu_sign1', 'flea_list');
        $this->setMemberCurItem('index');
        $this->setMemberCurMenu('member_flea');
        return View::fetch($this->template_dir . 'store_flea_list');
    }

    /**
     * 添加闲置
     */
    public function add_goods() {
        /**
         * 检测用户发布闲置物品个数
         */
        $flea_model = model('flea');
        $goods_num = $flea_model->getFleaCount(array('member_id' => session('member_id')));
        if ($goods_num >= 10) {
            $this->error(lang('store_goods_index_flea_notice1'));
        }
        /**
         * 实例化商品分类模型
         */
        $fleaclass_model = model('fleaclass');
        $goods_class = $fleaclass_model->getTreeClassList(1);
        View::assign('goods_class', $goods_class);
        /**
         * 地区
         */
        $this->fleaarea_show();

        $goods_image_path =  ATTACH_MFLEA . '/' . session('member_id') ;    //店铺商品图片目录地址
        View::assign('goods_image_path', $goods_image_path);
        View::assign('item_id', '');
        //查询会员信息
        $this->member_info = $this->getMemberAndGradeInfo(true);
        $this->setMemberCurItem('goods_add');
        $this->setMemberCurMenu('member_flea');
        View::assign('menu_sign', 'flea');
        View::assign('menu_sign_url', (string) url('Memberflea/index'));
        View::assign('menu_sign1', 'add_flea_goods');
        echo View::fetch($this->template_dir . 'store_flea_goods_add');
    }

    /**
     * 保存闲置物品
     */
    public function save_goods() {

        /**
         * 清除前一天冗余图片数据
         */
        $fleaupload_model = model('fleaupload');
        $upload_array = array();
        $upload_array[] = array('store_id', '=', session('member_id'));
        $upload_array[] = array('fleaupload_type', '=', '12');
        $upload_array[] = array('item_id', '=', '0');
        $upload_array[] = array('fleaupload_time', '<', TIMESTAMP - 24 * 60 * 60);
        $fleaupload_model->delFleaupload($upload_array, session('member_id'));
        unset($upload_array);

        if (request()->isPost()) {
            /**
             * 验证表单
             */
            $data = [
                'goods_name' => input('post.goods_name'),
                'goods_price' => input('post.goods_price')
            ];
            $memberflea_validate = ds_validate('memberflea');
            if (!$memberflea_validate->scene('save_goods')->check($data)) {
                ds_json_encode(10001, $memberflea_validate->getError());
            }
            /**
             * 实例化店铺商品模型
             */
            $flea_model = model('flea');

            $goods_array = array();
            $goods_array['member_id'] = session('member_id');
            $goods_array['member_name'] = session('member_name');
            $goods_array['goods_name'] = input('post.goods_name');
            $goods_array['fleaclass_id'] = input('post.cate_id');
            $goods_array['fleaclass_name'] = input('post.cate_name');
            $goods_array['flea_quality'] = input('post.sh_quality');
            $goods_array['flea_pname'] = input('post.flea_pname');
            $goods_array['fleaarea_id'] = input('post.area_id');
            $goods_array['fleaarea_name'] = input('post.area_info');
            $goods_array['flea_pphone'] = input('post.flea_pphone');
            $goods_array['goods_tag'] = input('post.goods_tag');
            $goods_array['goods_price'] = input('post.goods_price');
            $goods_array['goods_store_price'] = input('post.goods_store_price');
            $goods_array['goods_show'] = '1';
            $goods_array['goods_body'] = input('post.mct_introduce');
            $goods_array['goods_keywords'] = input('post.seo_keywords');
            $goods_array['goods_description'] = input('post.seo_description');
            
            $res=word_filter($goods_array['goods_name'].' '.$goods_array['goods_tag'].' '.$goods_array['goods_body'].' '.$goods_array['flea_pname'].' '.$goods_array['goods_keywords'].' '.$goods_array['goods_description']);
            if(!$res['code']){
                ds_json_encode(10001,$res['msg']);
            }
            if($res['data']['if_sensitive']){
                ds_json_encode(10001,implode('、',$res['data']['sensitive_msg']));
            }
            $state = $flea_model->addFlea($goods_array);
            if ($state) {
                /**
                 * 更新闲置物品多图
                 */
                $upload_array = array();
                $upload_array[] = array('store_id', '=', session('member_id'));
                $upload_array[] = array('item_id', '=', '0');
                $upload_array[] = array('fleaupload_type', 'in', array('12', '13'));
                $goods_file_id_array = input('post.goods_file_id/a');
                $upload_array[] = array('fleaupload_id', 'in', implode(",", $goods_file_id_array));
                $fleaupload_model->editFleaupload(array('item_id' => $state), $upload_array);

                /**
                 * 商品封面图片修改
                 */
                if (!empty($goods_file_id_array[0])) {
                    $image_info = $flea_model->getFleauploadList(array('fleaupload_id' => intval($goods_file_id_array[0])));
                    $goods_image = $image_info[0]['fleafile_name'];
                    $flea_model->editFlea(array('goods_image' => $goods_image), array('goods_id' => $state, 'member_id' => $this->member_info['member_id']));
                }
                ds_json_encode(10000, lang('store_goods_index_flea_add_success'));
            } else {
                ds_json_encode(10001, lang('store_goods_index_flea_add_fail'));
            }
        }
    }

    /**
     * 删除闲置物品
     */
    public function flea_del() {

        /**
         * 实例化闲置物品模型
         */
        $flea_model = model('flea');
        /**
         * 检查商品是否属于店铺
         */
        $goods_id = trim(input('goods_id'));
        if (empty($goods_id)) {
            ds_json_encode(10001, lang('param_error'));
        }
        //统计输入数量
        $goods_id_array = explode(',', $goods_id);
        $input_goods_count = count($goods_id_array);
        //统计确认的数量
        $condition = array();
        $condition[] = array('member_id', '=', session('member_id'));
        $condition[] = array('goods_id', 'in', $goods_id);
        $verify_count = $flea_model->getFleaCount($condition);
        //判断输入和确认是否一致
        if ($input_goods_count !== $verify_count) {
            ds_json_encode(10001, lang('param_error'));
        }

        $state = $flea_model->delFlea($goods_id);
        if ($state) {
            ds_json_encode(10000, lang('store_goods_index_flea_del_success'));
        } else {
            ds_json_encode(10001, lang('store_goods_index_flea_del_fail'));
        }
    }

    public function drop_image() {
        $id = intval(input('id'));
        $fleaupload_model = model('fleaupload');
        $drop_stata = $fleaupload_model->delFleaupload(array('fleaupload_id' => $id, 'store_id' => session('member_id')), session('member_id'));
        if ($drop_stata) {
            echo json_encode(array('done' => true));
            exit;
        }
    }

    /**
     * 编辑闲置物品页面
     */
    public function edit_goods() {
        /**
         * 实例化店铺商品模型
         */
        $flea_model = model('flea');
        $goods_array = $flea_model->getFleaList(array('goods_id' => intval(input('param.goods_id'))));
        View::assign('goods', $goods_array[0]);
        View::assign('goods_id', $goods_array[0]['goods_id']);

        $goods_image_path =  ATTACH_MFLEA . '/' . session('member_id');    //店铺商品图片目录地址
        $goods_image = $flea_model->getFleauploadList(array('store_id' => session('member_id'), 'item_id' => $goods_array[0]['goods_id'], 'fleaupload_type' => 12));
        if (is_array($goods_image) and ! empty($goods_image)) {
            $goods_image_1 = ds_get_pic($goods_image_path , $goods_array[0]['goods_image']); //封面图
            $image_key = 0;
            foreach ($goods_image as $key => $val) {
                $goods_image[$key] = $val;
                if ($goods_array[0]['goods_image'] == $val['fleafile_name'])
                    $image_key = $key;
            }
            if ($image_key > 0) {//将封面图放到第一位显示
                $goods_image_0 = $goods_image[0];
                $goods_image[0] = $goods_image[$image_key];
                $goods_image[$image_key] = $goods_image_0;
            }
        }
        View::assign('goods_image', $goods_image);
        View::assign('goods_image_path', $goods_image_path);
        /**
         * 实例化商品分类模型
         */
        $fleaclass_model = model('fleaclass');
        $goods_class = $fleaclass_model->getTreeClassList(1);
        View::assign('goods_class', $goods_class);
        View::assign('item_id', $goods_array[0]['goods_id']);
        //查询会员信息
        $this->member_info = $this->getMemberAndGradeInfo(true);
        $this->setMemberCurItem('goods_edit');
        $this->setMemberCurMenu('member_flea');
        View::assign('menu_sign', 'flea');
        View::assign('menu_sign_url', (string) url('Memberflea/index'));
        View::assign('menu_sign1', 'edit_flea');
        /**
         * 地区
         */
        $this->fleaarea_show();
        return View::fetch($this->template_dir . 'store_flea_goods_add');
    }

    /**
     * 编辑闲置物品保存
     */
    public function edit_save_goods() {
        $goods_id = intval(input('post.goods_id'));
        if ($goods_id != 0) {
            /**
             * 验证表单
             */
            $data = [
                'goods_name' => input('post.goods_name'),
                'goods_price' => input('post.goods_price')
            ];
            $memberflea_validate = ds_validate('memberflea');
            if (!$memberflea_validate->scene('edit_save_goods')->check($data)) {
                ds_json_encode(10001, $memberflea_validate->getError());
            }
            /**
             * 实例化闲置物品模型
             */
            $flea_model = model('flea');
            $goods_array = array();
            $goods_array['goods_name'] = input('post.goods_name');
            $goods_array['fleaclass_id'] = input('post.cate_id');
            $goods_array['fleaclass_name'] = input('post.cate_name');
            $goods_array['flea_quality'] = input('post.sh_quality');
            $goods_array['flea_pname'] = input('post.flea_pname');
            $goods_array['fleaarea_id'] = input('post.area_id');
            $goods_array['fleaarea_name'] = input('post.area_info');
            $goods_array['flea_pphone'] = input('post.flea_pphone');
            $goods_array['goods_tag'] = input('post.goods_tag');
            $goods_array['goods_price'] = input('post.goods_price');
            $goods_array['goods_store_price'] = input('post.goods_store_price');
            $goods_array['goods_show'] = '1';
            $goods_array['goods_body'] = input('post.mct_introduce');
            $goods_array['goods_keywords'] = input('post.seo_keywords');
            $goods_array['goods_description'] = input('post.seo_description');
            $state = $flea_model->editFlea($goods_array, array('goods_id' => $goods_id, 'member_id' => $this->member_info['member_id']));
            if ($state >= 0) {
                /**
                 * 闲置物品封面图片修改
                 */
                if (!empty($_POST['goods_file_id'][0])) {
                    $image_info = $flea_model->getFleauploadList(array('fleaupload_id' => intval($_POST['goods_file_id'][0])));
                    $goods_image = $image_info[0]['fleafile_name'];
                    $flea_model->editFlea(array('goods_image' => $goods_image), array('goods_id' => $goods_id, 'member_id' => $this->member_info['member_id']));
                }
                ds_json_encode(10000, lang('store_goods_index_flea_goods_edit_success'));
            } else {
                ds_json_encode(10001, lang('store_goods_index_flea_goods_edit_fail'));
            }
        }
    }

    /**
     * 上传图片
     */
    public function image_upload() {
        if (input('upload_type') == 'uploadedfile') {
            $fleaupload_model = model('fleaupload');
            $file_id = intval(input('post.file_id'));
            if ($file_id > 0) {
                $drop_stata = $fleaupload_model->delFleaupload(array('fleaupload_id' => $file_id, 'store_id' => session('member_id')), session('member_id'));
            }
            /**
             * 实例化json模型
             */
            /**
             * 上传图片
             */
            $upload_path = BASE_UPLOAD_PATH . DIRECTORY_SEPARATOR . ATTACH_MFLEA . DIRECTORY_SEPARATOR . session('member_id') . DIRECTORY_SEPARATOR;
            $file_name = session('member_id') . '_' . date('YmdHis') . rand(10000, 99999) . '.png';
            $res = ds_upload_pic(ATTACH_MFLEA . DIRECTORY_SEPARATOR . session('member_id'), 'file', $file_name);
            if ($res['code']) {
                $file_name = $res['data']['file_name'];
                //生成缩略图
                ds_create_thumb($upload_path, $file_name, '240,1024', '240,1024', '_small,_normal');
            } else {
                echo "<script type='text/javascript'>alert('" . $e->getMessage() . "');history.back();</script>";
                exit;
            }
            /**
             * 取得图像大小
             */
            list($width, $height, $type, $attr) = getimagesize(ds_get_pic(ATTACH_MFLEA . DIRECTORY_SEPARATOR . session('member_id'), $file_name));

            /**
             * 图片数据入库
             */
            $insert_array = array();
            $image_type = array('goods_image' => 12, 'desc_image' => 13); //debug
            $insert_array['fleafile_name'] = $file_name;
            $insert_array['fleafile_size'] = intval($_FILES['file']['size']);
            $insert_array['fleaupload_time'] = TIMESTAMP;
            $insert_array['item_id'] = intval(input('post.item_id'));
            $insert_array['store_id'] = session('member_id');
            $insert_array['fleaupload_type'] = $image_type['goods_image'];
            $result2 = $fleaupload_model->addFleaupload($insert_array);

            $data = array();
            $data['file_id'] = $result2;
            $data['file_name'] = $file_name;
            $data['file_path'] = $file_name;
            $data['file_url'] = ds_get_pic(ATTACH_MFLEA . '/' . session('member_id'),$file_name);
            $data['instance'] = 'goods_image';
            $data['id'] = intval(input('post.id'));

            /**
             * 整理为json格式
             */
            $output = json_encode($data);
            echo "<script type='text/javascript'>window.parent.add_uploadedfile('" . $output . "');</script>";
        }
        return View::fetch($this->template_dir . 'flea_upload_image');
    }

    /**
     * 判断当前分类是否为最后一级分类
     */
    public function check_class() {
        if (input('required') == 'false' and input('cate_id') == '0') {
            echo 'true';
            exit;
        }
        /**
         * 实例化商品分类模型
         */
        $fleaclass_model = model('fleaclass');
        $sub_class = $fleaclass_model->getFleaclassList(array('fleaclass_parent_id' => intval(input('get.cate_id'))));
        if (is_array($sub_class) and ! empty($sub_class)) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    /**
     * 买家闲置收藏
     *
     * @param
     * @return
     */
    public function favorites() {
        /**
         * 实例化模型
         */
        $fleafavorites_model = model('fleafavorites');
        /**
         * 类型
         */
        /**
         * 删除操作
         */
        if (input('drop') && input('drop') == 'ok' && input('fav_id')) {
            $fav_arr = explode(',', input('fav_id'));
            if (!empty($fav_arr) && is_array($fav_arr)) {
                /**
                 * 批量删除
                 */
                foreach ($fav_arr as $fav_id) {
                    if (intval($fav_id) > 0) {
                        $condition = array();
                        $condition[] = array('fleafav_id', '=', intval($fav_id));
                        $condition[] = array('member_id', '=', session('member_id'));
                        $condition[] = array('fleafav_type', '=', 'flea');
                        if (!$fleafavorites_model->delFleafavorites($condition)) {
                            ds_json_encode(10001, lang('flea_favorite_del_fail'));
                        }
                    }
                }
                Db::name('flea')->where('goods_id', 'in', $fav_arr)->dec('flea_collect_num')->update();
            } else {
                if (intval(input('get.fav_id')) > 0) {
                    $condition = array();
                    $condition[] = array('fleafav_id', '=', intval(input('get.fav_id')));
                    $condition[] = array('member_id', '=', session('member_id'));
                    $condition[] = array('fleafav_type', '=', 'flea');
                    if (!$fleafavorites_model->delFleafavorites($condition)) {
                        ds_json_encode(10001, lang('flea_favorite_del_fail'));
                    }
                    Db::name('flea')->where('goods_id', input('fav_id'))->dec('flea_collect_num')->update();
                }
            }
            ds_json_encode(10000, lang('flea_favorite_del_success'));
        }
        /**
         * 分页
         */
        /**
         * 得到收藏列表
         */
        $subQuery = Db::name('fleafavorites')->field('fleafav_id')->where(array('member_id' => session('member_id'), 'fleafav_type' => 'flea'))->buildSql();
        $show_page = Db::name('flea')->field('goods_id,goods_name,goods_image,goods_store_price,member_name,member_id')->where('goods_id in ' . $subQuery)->paginate(['list_rows' => 10, 'query' => request()->param()], false);
        $type_list = $show_page->items();
        if (!empty($type_list) && is_array($type_list)) {
            foreach ($type_list as $key => $fav) {
                if ($fav['goods_image']) {
                    $type_list[$key]['goods_image'] = ds_get_pic( ATTACH_MFLEA . '/' . $fav['member_id'] , str_replace('_1024', '_240', $fav['goods_image']));
                }
            }
        }
        //查询会员信息
        $this->member_info = $this->getMemberAndGradeInfo(true);
        /**
         * 页面输出
         */
        $this->setMemberCurItem('fav_flea');
        $this->setMemberCurMenu('member_flea');
        View::assign('menu_sign', 'flea_favorites');
        View::assign('favorites_list', $type_list);
        View::assign('show_page', $show_page);
        View::assign('menu_sign_url', (string) url('Memberflea/favorites'));
        View::assign('menu_sign1', 'flea_favorites_list');
        return View::fetch($this->template_dir . "favorites_flea_index");
    }

    /**
     * 增加买家收藏
     *
     * @param
     * @return
     */
    public function addfavorites() {

        if (intval(input('fav_id')) > 0) {
            /**
             * 实例化模型
             */
            $fleafavorites_model = model('fleafavorites');
            //判断商品,店铺是否为当前会员
            $flea_model = model('flea');
            $flea_info = $flea_model->getFleaList(array('goods_id' => intval(input('param.fav_id'))));
            if ($flea_info[0]['member_id'] == session('member_id')) {
                echo json_encode(array('done' => false, 'msg' => lang('flea_favorite_no_my_product')));
                die;
            }

            //闲置物品收藏次数增加1
            $check_rss = $fleafavorites_model->checkFleafavorites(intval(input('fav_id')), 'flea', session('member_id'));
            if (!$check_rss) {
                Db::name('flea')->where('goods_id', input('fav_id'))->inc('flea_collect_num')->update();
                $add_rs = $fleafavorites_model->addFleafavorites(array(
                    'member_id' => session('member_id'),
                    'fleafav_id' => intval(input('fav_id')),
                    'fleafav_type' => 'flea',
                    'fleafav_time' => TIMESTAMP
                ));
                if (!$add_rs) {
                    echo json_encode(array('done' => false, 'msg' => lang('flea_favorite_collect_fail')));
                }
                echo json_encode(array('done' => true, 'msg' => lang('flea_favorite_collect_success')));
            }
            echo json_encode(array('done' => true, 'msg' => lang('flea_favorite_collect_tips')));
        } else {
            echo json_encode(array('done' => false, 'msg' => lang('flea_favorite_collect_fail')));
        }
    }

    private function fleaarea_show() {
        /**
         * 加载模型
         */
        $fleaarea_model = model('fleaarea');
        $condition[] = array('fleaarea_parent_id', '=', 0);
        $area_one_level = $fleaarea_model->getFleaareaList($condition, 'fleaarea_id,fleaarea_name');
        View::assign('area_one_level', $area_one_level);
    }

    protected function getMemberItemList() {
        $menu_array = array();
        switch (request()->action()) {
            case 'index':
                $menu_array = array(
                    array('name' => 'index', 'text' => lang('idle_list'), 'url' => (string) url('Memberflea/index'))
                );
                break;
            case 'add_goods':
                $menu_array = array(
                    array('name' => 'index', 'text' => lang('idle_list'), 'url' => (string) url('Memberflea/index')),
                    array('name' => 'goods_add', 'text' => lang('release_idle'), 'url' => (string) url('Memberflea/add_goods'))
                );
                break;
            case 'favorites':
                $menu_array = array(
                    array(
                        'name' => 'fav_goods', 'text' => lang('ds_member_path_collect_list'),
                        'url' => (string) url('Memberfavorites/fglist')
                    ), array(
                        'name' => 'fav_store', 'text' => lang('ds_member_path_collect_store'),
                        'url' => (string) url('Memberfavorites/fslist')
                    ),
                    array(
                        'name' => 'fav_flea', 'text' => lang('collection_idle'), 'url' => (string) url('Memberflea/favorites')
                    )
                );
        }
        return $menu_array;
    }

}
