<?php
$config = array (	
		//应用ID,您的APPID。
		'app_id' => "2016092300580320",

		//商户私钥
		'merchant_private_key' => "MIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQCgUIRvt9w3bn1v4g6e5nxKZvXqVoOsaz+1oy0NZDBQaj6aojDC6YQ1R+FCJFhzC7ikuD1dKrnNAJffJKJc3JbzOpzBepmF8qybhjqDKOAj9imy3g3ltlmoADMNdSt6CfCohmCl19py71fjmiWCsOIP5O75nPtcuOoBS8MpXFYLI99O7AC7wLrG2+o6vp/2x2iUWRvPgy0ltXne8JmKoHIX74259vbh3OUPPkcbSseNFL7ZJrjYeZLBL7y6F5CKCMzqs/k6UqgqPt4sEe1mMTRuIRULv+60vnyrAnvVc+ny/Jt1MbfMuKLz88nJY6NmI9pRvDwxs4k2fmQfHGnKVjYNAgMBAAECggEATKaS2/O1+E787MzSHsmnLc/Szsu0w3C4EnnFpbx8mUZjTn40AE20p+EJZB2KqN821pM8y9oM4mbhNpEGjI3wIrWok52x3+iq/OWN/n5BxRAC2gHv9SBd98S4pDucoQo1pe4yMblmOkQT6sAeJUG7pMvaM0EKske7owj9dD4w6bvnguWGO/KqiLu5sXOnaqCg/ljn5kjFsvKmzvgZi7PVqX+O5WWI32r6tZDtZP5aZpYBWdS6btMjBfwZjvjimSwyLnWVoKhWaT2xUR+uirOHNKqz05G3XGdb3RJYmuOIZlNx4VvhjcV4TedNtH/KQ3RHLmO31+6bhopRU4/UgLWBxQKBgQDe3rnU8G/BiYAMsf1EYOHuspUHh6ALIj39tp+T7UXN6anFQaza5jadNWZfHQ/s4Wq120okKvvn7ATKF2Qt5yJ5naJYpaYCF7JIU1HJiIm+1A1i5xwWH54V0iKPLzayALVABwpQI/Fi1EPjG2129vhrSPt/cDXg50a/+zzzOXlzUwKBgQC4JUEatyuiPp9/3cJOeIJjUTHBqIWlb1RXMT0XdYX2cpxphWYBxD5JWYglHrkhl8in7YeUit7yM++p15zdXtSvF2EFPRYk/k/QYGCGFGx7hfrjbd6WWWIeBKvR+R7TGY1YkHX1Qr7qrErNpAoaAmi+Iv66Spm9zYxDy3/HNqjlHwKBgFjW16S2IxY2xUBKQvba17TaouVZfsZxY9yay4mf709hcTccMtcfJW4NNz16zDpUsMDFJQy9xaRxRId6Q4i4tdlcqLZFcaMr5vlFnTiEoMPcq2ldTqjS+aUhGn2RCHB0L8vSAp5ndXU7v8Przvq4/9VkRjxKcm+wQVeNwoIByxPZAoGABW5r3ira6Z0pPS9AROo/Bkjly815q6h991hnceKwgdVdkasymAi+wZEXd+jRExGUBIf4AMSb0M8BWaQXZ1wdr9BjtzDXD15E4mOFVU8S6A3KmZyq/QpD35jJrJbJdvaA+cTBBevjD67nQet9tMivaDRGCR6cLEH8yh8ddLXDA4cCgYEAq0szf7S0lGpurzZthXh+7wU3udo/G3WDYuVdIwfs+Mj89+jr1d6Lgm2PfiGiNcfbCkYip6G+nvmMBi/3HPdhi3K1p5QF6ihVDhfmRe0O0PPKbHPsh9HP+37YcIisS1y6m7hjuClCVxmF6xnkmXTf9Fr4o6QFBk3eJappPB7fbB8=",
		
		//异步通知地址
		//'notify_url' => "http://openapi.alipaydev.com/gateway.do/alipay.trade.page.pay-PHP-UTF-8/notify_url.php",
		'notify_url' => "#",
		
		//同步跳转
		'return_url' => "http://127.0.0.1/alipay/return_url.php",
		//'return_url' => "http://52.27.24.228/alipay/return_url.php",
	
		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipaydev.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
		'alipay_public_key' => "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAoFCEb7fcN259b+IOnuZ8Smb16laDrGs/taMtDWQwUGo+mqIwwumENUfhQiRYcwu4pLg9XSq5zQCX3ySiXNyW8zqcwXqZhfKsm4Y6gyjgI/Ypst4N5bZZqAAzDXUregnwqIZgpdfacu9X45olgrDiD+Tu+Zz7XLjqAUvDKVxWCyPfTuwAu8C6xtvqOr6f9sdolFkbz4MtJbV53vCZiqByF++Nufb24dzlDz5HG0rHjRS+2Sa42HmSwS+8uheQigjM6rP5OlKoKj7eLBHtZjE0biEVC7/utL58qwJ71XPp8vybdTG3zLii8/PJyWOjZiPaUbw8MbOJNn5kHxxpylY2DQIDAQAB",
);