网络编程与网络安全课程设计
===
# 简介

  本项目是《网络编程与网络安全》的课程设计，采用的是HTML,CSS,JS(JQ)和PHP开发的。旨在建立一个功能完善且安全可靠的电子商务网站。本网站选择以售卖英雄联盟周边为例，配备有完整的购物车功能；登录、注册、修改密码和找回密码功能；支持支付宝和Paypal两种支付手段的支付功能；用户购买记录查询功能；以及完整的管理员管理系统，包括增添改查商品类目和商品，以及管理订单记录。
 
# 配置和依赖
  ## 服务器租用的AWS的云服务器：  
  Amazon Linux 2 AMI (HVM), SSD Volume Type - ami-0385455dc2b1498ef (64 位 (x86)) / ami-05b186cbeb4bd0170 (64 位 ARM)  
  请参考：https://docs.aws.amazon.com/zh_cn/AWSEC2/latest/UserGuide/ec2-lamp-amazon-linux-2.html
  ## 本地服务器采用的WAMP：
  http://www.wampserver.com/en
# 网站效果图一览

  <div align=center><img src="https://github.com/XM-WANG/E-Commerce-Platform-Based-on-PHP/blob/master/images/11.png"/></div>  
    
  这是网站的主页，可以选择右上角的登录、购物车和主页中央的各类目进行操作，将鼠标hover在相应组件上的时候会有不同的弹窗，主要是对JS、JQ的应用。  
    
  <div align=center><img src="https://github.com/XM-WANG/E-Commerce-Platform-Based-on-PHP/blob/master/images/12.png"/></div>  
    
  这是登录界面，可以在下方选择是普通用户登录还是管理员登录或者注册，普通用户和管理员用户通过数据库里的特殊Flag区分。我个人其实是不想在这里开放管理员登录入口的，但是作业要求需要只好开放，我认为是有些不安全且没必要的。
    
  <div align=center><img src="https://github.com/XM-WANG/E-Commerce-Platform-Based-on-PHP/blob/master/images/13.png"/></div>
    
  这是商品管理界面，只有通过了admin用户登录认证之后，才会跳转到这里。普通用户无权访问。管理员可以通过此界面进行商品的删添改查
    
  <div align=center><img src="https://github.com/XM-WANG/E-Commerce-Platform-Based-on-PHP/blob/master/images/14.png"/></div>
    
  这是LTD分类中的分页，全部是根据数据库动态更新的，只要管理员后台上传了新的商品，该页面就会动态更新。
  
  <div align=center><img src="https://github.com/XM-WANG/E-Commerce-Platform-Based-on-PHP/blob/master/images/17.png"/></div>
    
  这是点开具体的商品页，也是动态页面，根据列表页面提交的pid，采用ajax向后台请求数据。
    
  <div align=center><img src="https://github.com/XM-WANG/E-Commerce-Platform-Based-on-PHP/blob/master/images/16.png"/></div>
    
  这是管理员的订单管理页面。
  
