## DSMall介绍
DSMall商城系统是基于ThinkPhp6.0+Vue开发的一套完善的B2B2C(多店铺商城)电商系统，DSMall商城系统能够快速积累客户、会员数据分析、智能转化客户、 有效提高销售、会员维护、网络营销的一款企业级应用，功能包含拼团、砍价、秒杀、优惠券、积分、分销、刮刮卡等功能，更适合企业二次开发


## 导航栏目
 [帮助手册](http://www.csdeshang.com/home/help/index/id/99.html)
 | [功能清单](http://www.csdeshang.com/home/dsmall/feature.html)
 | [官网地址](http://www.csdeshang.com)
 | [TP6开发手册](https://www.kancloud.cn/manual/thinkphp6_0/1037479)
 | [Vue.js手册](https://cn.vuejs.org/)


## QQ交流群
DSMall开源商城官方群:10235778  <a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=c75ccf9e6f21a2a3eea7914be3131bc4a7a00abe08cd3aa57532349292e84ffe"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="DSMall开源商城官方群" title="DSMall开源商城官方群"></a>


## 演示Demo
| 演示角色  | 演示地址                                | 账号 | 账号 |
|-------|-------------------------------------|----|----|
| 后台PC端 | https://dsmall.csdeshang.com/admin/ |  dsmall  |  123456  |
| 用户PC端 | https://dsmall.csdeshang.com/ |  buyer  |  123456  |
| 商家PC端 | https://dsmall.csdeshang.com/home/sellerlogin/login.html |  buyer  |  123456  |
| 用户手机端 | https://uniapp.dsmall.csdeshang.com |  buyer  |  123456  |
| 商家手机端 | https://uniapp.store.dsmall.csdeshang.com |  buyer  |  123456  |
| 门店手机端 | https://uniapp.chain.dsmall.csdeshang.com |  seller  |  123456  |


## 技术评价
1. B/S架构
2. MVC编码架构，采用Thinkphp6.0框架
3. 支持Compser
4. 支持阿里云存储
5. 支持负载均衡
6. 支持Mysql读写分离
7. 支持Redis/Memcached
8. 支持Linux/Unix/Windows服务器，支持Apache/IIS/Nginx等


## 系统功能
1. 设置：站点设置、账号同步、上传设置、SEO设置、邮箱短信、支付方式(支付宝/微信/银联)、权限设置、快递公司、地区管理、数据备份、操作日志
2. 会员：会员管理、会员级别、经验值管理、会员通知、积分管理、预存款、聊天记录
3. 商品：商品分类、品牌管理、商品管理、类型管理、规格管理、空间管理
4. 店铺：店铺管理、店铺资金、店铺保证金、店铺等级、店铺分类、店铺动态、店铺帮助、自营店铺
5. 交易：实物订单、虚拟订单、退款管理、退货管理、订单结算、咨询管理、举报管理、评价管理、结算管理
6. 网站：文章分类、文章管理、会员协议、导航管理、广告管理、PC端装修、手机装修、友情链接、平台客服
7. 营销：分销管理、抢购管理、虚拟抢购管理、拼团管理、限时折扣、满即送、优惠套装、推荐展位、会员等级折扣、代金券管理、活动管理、兑换礼品、平台充值卡、吸粉红包、刮刮卡、幸运大抽奖、幸运砸金蛋、生肖翻翻看
8. 统计：行业分析、会员统计、店铺统计、销量统计、商品统计
9. 公众号：公众号配置、微信菜单、关键字回复、绑定列表、消息推送
10. 直播：直播设置、直播申请、直播聊天



## 相关依赖SDK安装
1. 多应用模式扩展  composer require topthink/think-multi-app
2. think-view      composer require topthink/think-view
3. think-captcha   composer require topthink/think-captcha
4. think-image     composer require topthink/think-image
5. thinkphp-jump   composer require liliuwei/thinkphp-jump
5. 阿里云OSS       composer require aliyuncs/oss-sdk-php   
  介绍地址：https://help.aliyun.com/document_detail/32099.html?spm=5176.87240.400427.47.eaLg1R
6. phpmailer       composer require phpmailer/phpmailer
7. 阿里云短信      composer require alibabacloud/client
8. 腾讯云短信      composer require qcloudsms/qcloudsms_php
9. 签名工具        composer require firebase/php-jwt
10. 腾讯云点播      composer require tencentcloud/tencentcloud-sdk-php
   安装tencentcloud  PHP 5.6.33 版本及以上。https://github.com/tencentcloud/tencentcloud-sdk-php
11. 进入GatewayWorker子目录安装 composer install
12. 安装GatewayClient  composer require workerman/gatewayclient



## 安装教程
1. 将源码解压到服务器空间
2. 域名应该指向到public目录，因为应用入口文件位于public/index.php。比如我的DSMALL项目在  D:\www\dsmall  域名应该指向到 D:\www\dsmall\public
3. 进行安装 http://域名/install/install.php
4. 后台地址：http://域名/index.php/admin
5. 前台地址：http://域名/index.php/home

如果还有什么不懂的到DSMALL论坛(http://www.csdeshang.com)进行提问，以及下载最新版本。


## APIDOC 生成API
apidoc -i application/api/controller -o public/apidoc/


## 更新日志

#### V6.1.9
免费版更新
1. 优化 推荐组合
2. 优化 H5装修功能
3. 优化 统计功能

#### V6.1.9
免费版更新
1. 更新 QQ图标显示
2. 修复 代金券链接错误
3. 修复 订单详情付款状态显示错误
4. 修复 后台自营店铺注册信息无法上传营业执照
5. 优化 部分语言项
6. 优化 会员折扣显示

付费版更新
1. 新增 商品详情页面商品参数显示
2. 新增 注册页面用户协议勾选
3. 优化 登录页面图片验证码
4. 优化 接口

#### V6.1.8
免费版更新
1. 新增 平台代金券页面信息
2. 新增 收货地址门店地址核验提示
3. 新增 商品限制配送说明信息
4. 更新 可视化编辑促销活动搜索商品，只能搜索到活动开始的商品
5. 优化 可视化编辑设置
6. 优化 平台代金券显示
7. 优化 门店地址显示

授权版更新
1. 新增 平台代金券领取和查看
2. 新增 收货地址门店地址核验提示
3. 新增 商品限制配送说明信息
4. 修复 商品列表缓存无法更新
5. 优化 下单流程
6. 优化 用户绑定页面显示

#### V6.1.7
免费版更新
1. 新增 私密代金券查看
2. 新增 会员余额和店铺资金互转
3. 新增 平台代金券
4. 修复 店铺动态页面评论里面会员头像不显示
5. 修复 后台无法操作屏蔽商家动态
6. 修复 店铺后台 H5装修 砍价插件无法选择商品
7. 优化 微信接口
8. 优化 后台部分显示

授权版更新
1. 新增 平台代金券
2. 新增 订单列表搜索
3. 新增 商品详情页面店铺保障和店铺保证金显示
4. 修复 部分可视化编辑组件显示错误
5. 优化 可视化编辑功能部分组件显示
6. 优化 商品列表和商品详情跳转显示

#### V6.1.6
免费版更新
1. 新增 地区名称首字母
2. 新增 高德地图
3. 修复 店铺图片空间转移图片跳转
4. 修复 编辑商品规格图片页面切换图片相册失效
5. 优化 微信登录
6. 优化 可视化编辑
7. 优化 商家促销
8. 优化 部分后台显示

授权版更新
1. 新增 高德地图
2. 新增 商品列表页面展示商品排版切换
3. 优化 可视化编辑
4. 优化 商品详情页面显示
5. 优化 卖家中心分销商品页面显示
6. 优化 下单页面选择自提点提示
7. 优化 卖家中心添加规格页面显示

#### V6.1.5
免费版更新
1. 新增 快递鸟电子面单
2. 新增 卡券、网盘和下载类商品
3. 新增 微信素材库
4. 优化 微信菜单
5. 优化 文章图片上传提示

授权版更新
1. 新增 卡券、网盘和下载类商品
2. 修复 文章列表页面一页10条数据无法翻页
3. 修复 积分订单详情页面 下单时间不显示
4. 优化 实物订单详情页面
5. 优化 会员中心部分页面
6. 优化 卖家中心部分页面

#### V6.1.4
免费版更新
1. 新增 店铺中心用户可查看店铺的身份证或者营业执照
2. 新增 商品分类默认图
3. 新增 私密代金券功能
4. 更新 最新的省市区信息
5. 修复 商家等级对图片上传数量的限制不生效
6. 修复 第三方快捷登录用户注册成为商家无法进入店铺中心
7. 优化 部分页面语言项
8. 优化 直播功能
9. 优化 分销功能

授权版更新
1. 新增 私密代金券功能
2. 新增 店铺首页显示店铺评分信息
3. 修复 手机端首页广告已到期还在显示
4. 修复 店铺新增账号组失败
5. 修复 商品多规格会在商品列表里面重复显示
6. 优化 分销功能
7. 优化 首页、会员中心、收藏、浏览记录、我的钱包等页面显示，手机端整体页面优化


#### V6.1.3
免费版更新
1. 新增 后台营销，拼团、预售、砍价活动删除功能
2. 新增 商家入驻线上缴费
3. 修复 后台咨询店铺链接错误
4. 修复 商品已经选择了匿名评价，鼠标放到评价者头像上的时候还是会看到会员名
5. 修复 F码商品无法下单
6. 修复 平台后台商品分类设置里面推荐分类和推荐品牌无法清空勾选
7. 优化 直播
8. 优化 站点关闭
9. 优化 商家入住时卖家登录账号和买家登录账号一致 
10.优化 隐藏手机号

授权版更新
1. 新增 商家入驻线上缴费
2. 新增 商家入驻付款页面添加一个平台联系电话，方便商家沟通
3. 修复 手机端只展示10条评论 无法翻页
4. 修复 提现选项多个无法滑动
5. 修复 实名认证页面剪裁图片没有使用按钮
6. 修复 直播封面说明现只能用图片
7. 优化 直播
8. 优化 商家入住时卖家登录账号和买家登录账号一致 
9. 优化 商家入驻详细地址选择时地址 


#### V6.1.2
免费版更新
1. 新增 手机端访问商品详情和店铺首页统计入店铺流量
2. 新增 商品详情页面SEO KEY信息
3. 更新 后台优惠套餐可设置商品最大值由5个修改为6个
4. 更新 关注红包名称为注册红包，并删除后台注册红包和奖品红包的链接地址按钮
5. 更新 个人入驻第一步里面店铺名称为线下店铺名称
6. 修复 商家中心单个图片转移相册提示语不显示的问题
7. 修复 会员中心头部用户中心模块里面链接错误的问题
8. 修复 库存预警和自提订单消息存储不了的问题
9. 修复 首页悬浮图片删除按钮不显示的问题
10.修复 文章列表以及文章详情页面文章分类为空，现新增文章分类内容
11.优化 商家中心拼团、砍价、预售、推荐展位 四个促销活动购买套餐后跳转到对应活动列表页面
12.优化 退款退货页面申请退款服务类型选择显示
13.优化 商品详情页面，商品规格库存为0不能点击选择该商品规格

授权版更新
1. 新增 访问商品和店铺首页，统计入店铺流量
2. 修复 申请提现后，后台申请显示页面收款银行文字显示错误
3. 修复 商品详情页面点击图片显示黑屏的问题
4. 修复 积分代金券页面成功兑换代金券没有提示的问题
5. 优化 商品分类页面加载很慢的问题
6. 优化 订单详情页面显示
7. 优化 登录
8. 优化 商家中心添加商品流程
9. 优化 下单页面商品支持货到付款文字显示
10.优化 手机端编辑发票页面显示
11.优化 商品规格库存为0时不允许点击


#### V6.1.1
免费版更新
1. 新增 IM列表加一个我关注的人列表
2. 新增 商家待后台审核的商品，如果平台关闭审核，是否所有商品通过审核的开关
3. 新增 普通注册是否开启开关
4. 更新 商品视频上传大小由原来的2M改为20M
5. 修复 微信账号绑定会员邮箱和手机切换拉取不到会员信息
6. 修复 手机号码注册的会员无法获取注册红包的问题
7. 修复 所有分类页面不显示图片的问题
8. 修复 闲置分类页面搜索不到商品的问题
9. 修复 商品规格市场价批量处理的时候不能设置小数点的问题
10.修复 微信菜单收藏量按钮无法生效的问题
11.修复 商品规格市场价批量处理的时候不能设置小数点的问题
12.优化 猜你喜欢只显示一个商品规格
13.优化 商品详情查看图片时关闭视频

授权版更新
1. 新增 会员中心显示会员等级
2. 新增 订单删除功能
3. 新增 普通注册开关
4. 美化 首页导航图标
5. 美化 底部导航图标
6. 美化 会员中心图标
7. 美化 首页 分类页面 商品详情 商品列表 下单 登录 注册 会员中心等各个页面
8. 优化 猜你喜欢只显示一个商品规格

#### V6.1.0
免费版更新
1. 新增 附近门店功能
2. 新增 商家后台商品列表页面按库存排序展示商品
3. 新增 百度敏感词过滤功能
4. 新增 百度图片审核功能
5. 修复 后台会员列表 旺旺客服图片不显示和无法发起会话的问题
6. 修复 邮件发送 邮件内容里面链接错误的问题
7. 修复 商品咨询验证码点击不变的问题
8. 修复 代金券上传图片没有变化的问题
9. 优化 发货单打印显示
10.优化 拼团功能和美化
11.优化 淘宝导入
12.优化 下单付款页面操作

授权版更新
1. 新增 手机端积分中心
2. 新增 卖家后台商品规格管理功能
3. 新增 附近门店功能
4. 新增 银联WAP支付
5. 修复 个人信息页面出生日期显示错误
6. 修复 商品列表属性筛选窗口 属性太多无法下拉的问题
7. 修复 手机端好友列表搜索结果无法翻页显示更多的问题
8. 美化 手机端砍价页面
9. 美化 拼团
10.美化 会员中心和店铺中心
11.美化 砍价

#### V6.0.9
免费版更新
1. 更新 取消订单和收到货款的事物放到控制器中处理，因为mysql的事物不能嵌套
2. 修复 可视化编辑保存报错
3. 修复 发邮件乱码
4. 修复 邮件地址没有域名导致跳转错误的问题
5. 修复 取消后还显示限时折扣的bug
6. 修复 后台订单统计只统计一条数据的bug
7. 修复 xss攻击漏洞
8. 修复 统计导出报错
9. 优化 PC端生日年份选择


授权版更新
1. 新增 预售功能
2. 更新 取消订单和收到货款的事物放到控制器中处理，因为mysql的事物不能嵌套
3. 更新 预存款/充值卡足额支付后的逻辑可统一放到收到货款处理
4. 修复 用户使用了预存款支付了部分金额后，如果卖家调整了订单金额且金额小于用户已支付的金额则待支付金额显示为负数
5. 修复 会员协议详情，上传的图片，进行删除，点击确定之后，图片能够删除，弹出不关闭
6. 修复 取消后还显示限时折扣的bug
7. 修复 砍价详情页面 已砍价  价格显示多位小数点的问题
8. 修复 后台调整用户积分后不能享受会员折扣的bug
9. 修复 推广海报头像太大扫不出二维码的问题
10.修复 到货通知缺少参数
11.修复 统计导出报错
12.修复 xss攻击漏洞
13.修复 邮件地址没有域名导致跳转错误的问题

#### V6.0.8
免费版更新
1. 新增 后台编辑页面底部显示备案号，网安备信息
2. 新增 物流缺省值
3. 更新 当前分销模式 从店铺后台可以独立设置分销比例 平台后台统一设置分销比例
4. 修复 修改用户昵称页面顶部昵称显示不同步显示修改的问题
5. 修复 后台同时上传后台LOGO和前端LOGO的时候，不生效的问题
6. 修复 商家后台 商品列表 快捷修改商品价格后 前端不同步显示的问题
7. 修复 部分页面OSS图片显示的问题
8. 修复 自提门店，删除门店按钮无效的问题
9. 修复 会员头像无法上传的问题
10.修复 生成个人推广海报的时候，获取不到会员头像的问题
11.修复 商家端无法查看IM聊天内容的问题
12.修复 商家端统计显示的问题
13.修复 虚拟商品下单，选择代金券后商品总价显示不随代金券金额减少的问题

授权版更新
1. 新增 虚拟下单页面显示预存款余额
2. 修复 当前分销模式 从店铺后台可以独立设置分销比例 平台后台统一设置分销比例
3. 修复 移动端自提门店，删除门店按钮无效的问题
4. 修复 移动端会员头像无法上传的问题
5. 修复 移动端生成个人推广海报的时候，获取不到会员头像的问题
6. 修复 移动端分类图片不显示的问题
7. 优化 移动端点击返回按钮返回操作
8. 优化 移动端子账号权限

#### V6.0.7
免费版更新
1. 新增 小程序组件直播错误提示
2. 更新 聊天服务器改成workman
3. 更新 线下门店模块，现虚拟兑换码前缀设置移动到店铺设置页面
4. 修复 腾讯短信参数问题
5. 修复 企业入驻上传图片报错的问题，且个人入驻付款页面新增显示付款金额明细和应付总金额
6. 修复 设置了奖品但是中奖概率为0 造成其他中奖概率为100的无法中奖
7. 修复 用户领取的红包放到充值卡余额
8. 修复 微信快捷登录后，无法返回砍价页面的问题
9. 修复 后台更换会员默认头像不生效的问题
10.修复 商品编辑页面选择了相册分类但是仍然上传到了默认相册的问题
11.优化 店铺后台，虚拟订单详情买家名称显示
12.优化 店铺统计页面

授权版更新
1. 新增 移动端首页导航抢购页面导航
2. 更新 聊天服务器改成workman
3. 修复 直播封面和直播背景图片 不能上传之后，点击 使用按钮无效的问题
4. 修复 移动端没有设置物流公司时无法选择的问题
5. 修复 选择货到付款时  还可以选择预存款的问题
6. 修复 抢购活动页面，切换栏目后，再次点击切换没有数据的问题
7. 修复 微信快捷登录后，无法返回砍价页面的问题
8. 优化 门店中心，订单详情页面显示


#### V6.0.6
免费版更新
1. 新增 小程序组件直播
2. 新增 自提点功能
3. 新增 订单列表的退货退款中链接
4. 修复 周边页面第二个店铺以后都无法显示商品的问题
5. 修复 对比页面 对比商品的规格值不包含现有规格属性的时候会出错的问题
6. 修复 打印发货单页面 印章图片的位置
7. 修复 后台咨询管理页面翻页按钮样式错乱的问题
8. 修复 后台地区管理删除地区配送地区不同步的问题
9. 修复 IM聊天时间显示的问题
10.修复 全站图片可上传到OSS
11.修复 抢购商品和普通商品一起结算时出错的问题
12.修复 商家后台 账户组勾选权限不显示的问题
13.优化 商品搜索
14.优化 专题页面显示

授权版更新
1. 新增 小程序组件直播
2. 新增 手机端装修顶部搜索
3. 新增 自提点功能
4. 新增 下单页面显示已优惠多少金额
5. 新增 手机端显示会员等级折扣
6. 更新 百度地图接口升级
7. 修复 微博登录BUG
8. 修复 手机端商品详情页面点击图片放大后返回上一页在点击其他商品进入商品详情页面会进入之前查看大图模式
9. 优化 手机端积分记录描述
10.优化 抢购列表页面


#### V6.0.5
免费版更新
1. 新增 批发功能
2. 新增 待付款订单可以预存款支付
3. 更新 直播商品列表样式
4. 修复 后台无法恢复备份的问题
5. 修复 后台关闭4个消息模板后，商家后台接受消息页面会报错的问题
6. 修复 已退款成功的订单会出现在待评价页面

授权版更新
1. 新增 批发功能
2. 新增 待付款订单可以预存款支付
3. 更新 手机端店铺详情页面 无用的店铺背景图
4. 更新 商品详情页面没有视频就不显示视频按钮
5. 修复 已退款成功的订单会出现在待评价页面
6. 修复 手机端文章列表页面无法翻页的问题
7. 修复 微信绑定已有用户出错的问题

#### V6.0.4 
免费版更新
1. 新增 猜你喜欢功能
2. 新增 商品主图视频功能
3. 新增 后台自营店铺可以选择店铺分类
4. 新增 阿里云直播
5. 更新 分销会员功能
6. 更新 评论显示
7. 更新 注册会员页面
8. 修复 后台管理员可以添加重复名称的问题
9. 修复 后台店铺帮助 帮助内容列表不显示内容帮助类型的问题
10.修复 取消规格选中，隐藏不了规格名称的问题
11.修复 搜索页面默认排序不生效的问题
12.修复 后台限时折扣列表批量删除按钮无效的问题
13.修复 限时折扣活动结束，商品不解除锁定的问题
14.修复 直播审核页面没有设置直播商品会报错的问题

授权版更新
1. 新增 商品主图视频
2. 新增 猜你喜欢功能
3. 新增 阿里云直播
4. 新增 手机端商品锁定按钮
5. 更新 手机端规格市场价和重量取消必填项
6. 更新 手机端商家入驻添加店铺分类必填项提示语
7. 更新 微信分享功能
8. 更新 手机端规格值设置
9. 修复 手机端添加商品ID错误和图片说明尺寸不对的问题
10.修复 苹果手机无法使用微信登录的问题
11.修复 未登录时购物车页面会卡住的问题

#### V6.0.3
免费版更新
1. 新增 店铺入驻可选入驻类型，（仅个人，仅企业，全部可选，全部关闭）
2. 新增 如果商品正在直播则显示直播小图标
3. 新增 如果店铺有直播 则在店铺首页显示
4. 更新 PC端主播不在线也可以显示直播详情页
5. 修复 后台数据无法备份的问题
6. 修复 首页楼层底部广告没有数据时，会显示侧边栏广告的问题
7. 修复 现在不上传商品图片也可以添加商品
8. 修复 添加后台管理员密码可以为空
9. 优化 推荐组合设置
10.优化 拼团功能
11.优化 手机号登录
12.优化 页面可编辑功能

授权版更新
1. 新增 手机端专题活动模块
2. 新增 店铺入驻可选入驻类型，（仅个人，仅企业，全部可选，全部关闭）
3. 更新 手机端登录图片验证码
4. 修复 可编辑功能轮播图只显示最后一张图的问题
5. 优化 手机端快捷登录
6. 优化 页面
7. 优化 入驻时的店铺定位
8. 优化 商品列表排序

#### V6.0.2
免费版更新
1. 新增 批量打印发货单和批量发货的功能
2. 新增 后台LOGO可设置
3. 新增 直播带货功能
4. 更新 数据表索引
5. 更新 举报类型
6. 修复 微博登录和注册短信验证码不生效的问题
7. 修复 后台一次不能添加多个会员等级的问题
8. 修复 个人入驻报错的问题
9. 修复 店铺登录 前端不显示昵称的问题
10.修复 API接口赠品数据

授权版更新
1. 新增 直播带货
2. 新增 订单列表和订单详情显示赠品
3. 更新 会员中心显示昵称
4. 更新 页面显示，用户中心，及下单页面的界面部分美化
5. 更新 订单详情、新增店铺链接
6. 修复 当满送的商品被删除或者下架之后，不显示满赠商品

#### V6.0.1
免费版更新
1. 更新 入驻营业执照日期添加长期，添加说明文字，结束日期不填则表示营业时间为长期
2. 修复 验证码错误
3. 修复 代金券套餐价格为0时，店铺添加完代金券后，在编辑代金券会提示没有购买套餐的问题
4. 修复 拼团，砍价活动，商品被下架了，手机端还显示这个活动的问题
5. 修复 用户未登录列表中暂时不显示加入购物车按钮
6. 优化 后台商品列表显示
7. 优化 语言项

授权版更新
1. 新增 手机端头部title可在后台设置
2. 更新 店铺首页新增显示店铺地图的入口
3. 更新 下单页面新增店铺链接
4. 更新 下单页面新增显示预存款数额
5. 更新 会员中心订单列表页面新增显示订单商品信息
6. 修复 APP支付返回不到商城的问题
7. 修复 手机端发布商品的时候商品描述不能添加图片的问题
8. 修复 店铺首页不显示订单数量的问题
9. 优化 手机端发票商品，商品规格的选中
10.优化 评论显示

#### V6.0.1
Thinkphp由TP5.0.24升级为TP6.0


#### V5.1.0
免费版更新
1. 新增 腾讯云短信
2. 新增 商品重量 运费可选择按重量计费
3. 新增 店铺商品排序
4. 新增 可视化编辑功能
5. 更新 取消后台手机端默认广告的删除按钮
6. 更新 平台后台文章、商品、店铺列表新增显示ID数据 以便广告设置添加对应ID
7. 修复 微信扫码注册的账号WXINFO里面无法更新openid的问题
8. 修复 获取提现账号名变量错误
9. 修复 redis的问题
10.修复 银联支付的问题
11.修复 经营类目只有二级时，下单会获取不到分类佣金的问题
12.修复 平台后台支付配置说明文字

授权版更新
1. 新增 可视化编辑功能
2. 更新 删除绑定会员的邮箱验证
3. 更新 手机端新增活动列表页面
4. 更新 登录页面新增验证码验证
5. 更新 提现列表去除微信提现账号
6. 更新 手机端新增店铺地图导航
7. 更新 商品详情页面商品有多规格的时候优先弹出规格选择窗口
8. 修复 注册会员验证码跨域报错
9. 修复 微信码扫描
10.修复 支付跨域
11.修复 双域名无法跨域的问题
12.修复 手机端商品有促销价格的时候切换规格会显示回正常价格而不是显示促销价的问题
13.修复 浏览记录页面无法跳转商品的问题
14.修复 申诉内容不显示的问题
15.修复 添加商品规格的库存默认值
16.优化 购物车

#### V5.0.8
免费版更新
1. 新增 店铺登录验证码
2. 新增 后台 添加和编辑礼品页面  删除编辑器图片的成功提示
3. 更新 会员认证图片时限制字段
4. 更新 下单时验证代金券金额
5. 更新 后台礼品兑换详情，详细地址显示三级地区
6. 更新 当微信未结算资金不足时更换资金来源重试
7. 更新 商品库存更新不放到缓存里，直接更新，用锁控制
8. 修复 后台退款详情页面 提交按钮显示
9. 修复 裁剪头像没验证图片地址的漏洞
10.修复 前端 店铺首页和商品详情页面左侧店铺地图 使用经纬度定位，使定位更准确。
11.修复 店铺新增优惠套装，移除商品不会移除价格，导致新增优惠套装里面 没有商品也会添加成功，然后列表页面报错的问题。
12.修复 后台地区只能设置三级
13.修复 店铺 个人入驻的问题
14.修复 积分兑换页面 兑换商品名称长度过长显示的问题
15.修复 店铺后台 订单结算页面导出EXCEL 按钮失效的问题
16.修复 会员折扣的问题
17.修复 阿里云短信因为参数长度问题造成发送不成功
18.修复 发出红包数量会比实际总数量多一个
19.修复 统计，会员统计，会员规模分析，点击分页与分页箭头报错提示
20.修复 平台添加礼品时，不能有效的选择小时的时间
21.修复 虚拟商品下单会发送两次信息的问题。
22.修复 淘宝助手导入替换详情图片时，有些情况会出现运行超时的问题
23.修复 平台商品分类绑定类型，平台在商品类型设置的时候，并没有勾选品牌；商家在发布的商品的时候，却是可以调取所有品牌信息进行选择
24.修复 店铺后台 发货管理页面无法显示赠品商品图片的问题
25.修复 平台砍价活动，点击取消修改状态失败
26.优化 后台统计页面

授权版更新
1. 新增 分享海报
2. 新增 商品数量手动输入
3. 更新 手机端未检查seller_name未填写的情况，导致审核失败
4. 更新 有些时候点击菜单后进入空白的问题
5. 更新 扩大重新定位的按钮
6. 修复 签到开关按钮无效，关闭之后一样可以进行签到
7. 修复 规格显示问题  手机端自动跳转
8. 修复 手机端商品下架 购物车依然可以选中下单的问题
9. 修复 当pc域名是一级域名造成的微信登录问题
10.修复 手机端抢购页面的上下拉问题
11.修复 app支付完返回不了app的bug
12.修复 手机端拼团列表时间显示问题
13.修复 手机端浏览商品没有浏览记录的问题

#### V5.0.7
免费版更新
1. 新增 商品详情页面 限时折扣活动没有设置标题的默认标题
2. 新增 提现到支付宝、微信
3. 新增 提现额度范围设置
4. 新增 意见反馈功能
5. 更新 支付宝APP支付
6. 更新 支付宝SDK升级
7. 更新 去除重复的语言项
8. 更新 网站后台店铺动态评价-评价分数显示
9. 更新 后台微信消息模板从微信模块移动到邮箱短信消息模块
10.修复 第三方登录
11.修复 分销开关不生效
12.修复 微博API接口调用不了类的问题
13.修复 H5路径引用
14.修复 商家限时折扣 商品列表页面  商品名称带有单引号会报错 不显示商品列表
15.修复 商家添加砍价活动时 变量名错误
16.修复 商品规格促销  现一个商品多个规格 每个规格可参与各自的促销
17.修复 微博绑定nickname报错
18.修复 手机号注册的会员，在商品评分里面隐藏手机号会员名的中间4位号码
19.修复 商家导出订单出错
20.修复 商家修改订单金额，获取的佣金是按原实际金额算
21.修复 退货详情页面上传凭证图片不显示的问题
22.修复 发送邮件时，html显示问题

授权版更新
1. 新增 支付中间页面
2. 新增 手机端用户反馈
3. 新增 手机端店铺显示距离
4. 新增 手机端显示商品分销佣金
5. 新增 拼团列表、成团列表倒计时
6. 新增 会员资金相关页面和退款页面的整合页面。
7. 新增 兑换代金券页面，新增兑换所需积分值和一个兑换按钮。
8. 新增 商家自己拍的照片都大于2M，自己上传不了，如果上传图片大于2M，则后台可以选择裁切及压缩。
9. 更新 手机端分销管理
10.更新 手机端组合营销功能（优惠套餐）显示
11.更新 支付宝+提现到支付宝、微信
12.更新 手机端商品详情页面新增显示满送活动里的赠送商品
13.修复 手机端验证码出错的问题
14.修复 商品详情页面库存显示。
15.修复 手机端定位不准的问题
16.修复 订单预存款支付，支付密码填写错误提交后 就不会在弹出输入密码框
17.修复 手机端商家入驻的时候 新增无用的经营类目的时候，后台审核页面会报错的BUG。


#### V5.0.6
免费版更新 
1. 新增 阿里云短信
2. 新增 后台设置手机端访问PC端自动跳转
3. 新增 售卖区域制定的区域不邮寄
4. 新增 会员折扣设置小数
5. 更新 去除自营店铺显示店铺等级
6. 更新 去除商品编辑市场价必选项
7. 更新 去除商城运单功能
8. 修复 百度地图BUG
9. 修复 HTTPS网站使用微信登录无法生成二维码
10.修复 顺丰快递物流BUG
11.修复 后台管理权限BUG
12.修复 后台添加店铺增加经营类目
13.修复 邮箱验证删除多余HOME_SITE_URL和转义
14.修复 积分说明计算方式
15.修复 添加分销商品语言项

授权版更新
1. 新增 商家手机端上传商品
2. 新增 会员支付密码
3. 新增 售卖区域，就是制定的区域不邮寄
4. 新增 商品详情骨架屏
5. 新增 手机端店铺入驻
6. 更新 去除注册邮箱必填
7. 修复 手机端货到付款BUG
8. 修复 没有规格值的的规格不显示
9. 修复 推广链接注册不显示推荐员BUG
10.修复 IOS手机 商品详情页面和商品分类页面滑动卡顿的问题


#### V5.0.5
免费版更新
1. 新增 规格库存编辑
2. 新增 虚拟代金券
3. 新增 后台规格名称和规格分类搜索规格的功能
4. 更新 时间插件新增中文
5. 更新 语言项重复替换
6. 更新 网站LOGO图过大会影响页面显示，限制网站LOGO图最大值为220X46
7. 修复 非自营店铺的店铺动态页面报错的问题
8. 修复 用户在未登录的情况下点击聊天没有反应的问题
9. 修复 快递鸟key参数错误的问题
10.修复 系统发生的短信未记录到短信日志中，且未做限制
11.修复 支付宝、微信退款原账号 部分退款、不同店铺退款BUG
12.修复 只有一级分类时发布商品提示未绑定分类的bug
13.修复 户收货地址的city_id和area_id错了

授权版更新
1. 新增 虚拟拼团功能
2. 修复 手机端个人信息页面选择日期选项 选择完月份会比选择时少一个月和IOS系统不能选择日期的问题
3. 修复 手机端会员中心订单数量气泡不显示的问题
4. 修复 手机端支付页面偶尔不出现支付列表的BUG

#### V5.0.4
免费版更新
1. 新增 用户首次访问显示悬浮窗
2. 新增 结算订单显示结单日期
3. 新增 支付宝/微信订单款项原路退回。
4. 更新 快递查询接口
5. 更新 去除重复语言项
6. 修复 手机端充值卡充值失败问题
7. 修复 后台搜索举报类型
8. 修复 商品分类图片上传的限制
9. 修复 运单模板
10.优化 商品列表，限时折扣以及抢购 图标


授权版更新
1. 新增 店铺详情信息
2. 更新 当未添加手机端商品详情时，自动显示PC端商品详细
3. 修复 附近店铺显示已开启的店铺



#### V5.0.3
免费版更新
1. 新增 单店铺门店模块，含子门店信息以及门店管理员
2. 新增 实名认证功能，后台开启用户需实名认证才能购买商品。
3. 更新 分享图片功能
4. 更新 淘宝CSV文件的商品的导入导出
5. 更新 支付方式，让显示更友好
6. 修复 免运费功能缺陷
7. 修复 未登录时加入失败的提示
8. 修复 聊天中包含商品时的样式
9. 优化一系列细节，提高用户体验


授权版更新
1. 更新 手机端筛选功能
2. 修复 手机端不显示系统消息
3. 修复 手机端禁止登录账户可正常登录
4. 修复 当未添加手机端商品详情时，自动显示PC端商品详细



#### V5.0.1
免费版更新 
1. 新增 可视化模板编辑
2. 新增 PC端砍价列表
3. 新增 广告图加上链接类型
4. 新增 淘宝导入导出，商品数据包下载和商品图片下载
5. 修复 店铺中心店铺名过长的问题
6. 优化 倒计时插件
7. 优化 推广二维码界面

授权版更新
1. 更新 界面美化


#### V3.2.6
免费版更新
1. 新增 整站推荐功能
2. 新增 后台编辑店铺排序
3. 新增 套餐设置为0元时，店铺可免费使用。
4. 更新 美化用户中心侧边栏界面
5. 修复 管理员权限菜单bug、美化列表页
6. 修复 取消订单时间限制
7. 修复 html过滤后商品名称过长的提示
8. 修复 店铺已关闭，店铺管理中心未有提示
9. 优化 导航管理

授权版更新
1. 新增 红包、大转盘、刮刮卡、砸金蛋、生肖翻翻看等平台活动
2. 新增 砍价活动


#### V3.2.3
免费版更新
1. 新增 部分API缓存
2. 新增 初始安装环境监测openssl扩展 以及 BCMath扩展
3. 修复 取消微信支付报错
4. 修复 店铺导航显示问题
5. 修复 货号退款没有增加库存

授权版更新
1. 新增 部分API缓存
2. 更新 微信分享
3. 更新 手机端详情用原图（因为压缩图显示不完整）
4. 修复 支付密码错误没提示


#### V3.2.2
免费版更新
1. 新增 依据电商法行业规范单独的营业执照页
2. 更新 PC端买家中心/PC端卖家中心界面美化
3. 修复 163邮箱乱码问题
4. 修复 非自营店铺货到付款地区设置显示错误
5. 修复 用户中心通过缓存删除单条浏览记录
6. 修复 店铺导航显示问题
7. 修复 微信支付必须开启微信扫码支付
8. 修复 图片水印无法正常显示

授权版更新
1. 新增 手机端充值卡记录功能
2. 新增 签到赠送积分

#### V3.2.1
授权版更新（ThinkPHP+VUEJS）
1.新增 H5端卖家管理
3.新增 手机端查找好友，及时聊天
4.新增 举报商品
5.新增 商品咨询
6.更新 卖家账户/买家账户同步登录
7.优化 用户绑定手机流程

免费版更新
1.新增 发票管理
2.更新 卖家账户/买家账户同步登录
3.优化 用户绑定手机流程
4.优化 商品界面
5.优化 部分界面美化

#### V3.1.1
1. 新增 管理快递公司
2. 新增 通联支付
3. 新增 数据导入导出功能
4. 优化 重复语言包定义
5. 优化 开店流程

#### V3.0.3
1. 新增 分销市场功能
2. 更新 店铺结算放入日执行任务中
3. 更新 分销员调整上级的BUG
4. 修复 微信扫码登录BUG
5. 优化 闲置语言包以及收藏BUG

#### V3.0.1
1. 优化 后台界面
2. 优化 商家结算，管理后台可设置商家结算周期，以及商家可自行申请提现。
3. 优化 手机端分类页的体验
4. 优化 后台登陆退出

#### V2.5.7
1. 更新 初始化数据的多余图片
2. 修复 微信自动登录没有unionid时需要中断
3. 修复 苹果手机小程序支付的小BUG
4. 修复 语言包BUG
5. 修复 SNS显示错位
6. 优化 后台界面








