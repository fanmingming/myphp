# myphp
30秒在Vercel构建自己的无服务器php环境并实现国内直连访问。
### 操作步骤：
- 准备好域名
- 为域名添加一条CNAME到`cname-china.vercel-dns.com`
- 点击下方按钮跳转并部署

<a href="https://vercel.com/new/clone?repository-url=https%3A%2F%2Fgithub.com%2Ffanmingming%2Fmyphp&project-name=MyPHP&repository-name=MyPHP"><img src="https://vercel.com/button"></a>
- 找到Vercel项目的域名设置，改为你的域名保存
- 访问你的域名
> 最后你可以：删除仓库的`README.md`，编辑或删除`index.html`。
### 说明：
- 这只是一个简单的示例，每次编辑或上传新的php文件到Github仓库的api目录下都会自动构建。构建完成后访问`你的域名/api/文件名.php`即可。
### 主要目录文件结构：
```sh
myphp
├── api
│   └── index.php
└── vercel.json
```
### php版本：
默认部署的php版本为8.3.X。编辑`vercel.json`文件可构建不同版本的php环境。
- `vercel-php@0.7.1` - PHP 8.3.x
- `vercel-php@0.6.2` - PHP 8.2.x
- `vercel-php@0.5.5` - PHP 8.1.x
- `vercel-php@0.4.4` - PHP 8.0.x
- `vercel-php@0.3.6` - PHP 7.4.x
### 官方仓库：
- https://github.com/vercel-community/php/
### 更新说明
- 同步官方仓库，更新PHP版本。
