# myphp
30秒在Vercel构建自己的无服务器php环境并实现国内直连访问。
### 操作步骤：
- 准备好域名
- forks本项目
- 为域名添加一条CNAME到`cname-china.vercel-dns.com`
- 访问 https://vercel.com 使用Github账号登陆，选择`myphp`并构建。
- 编辑Vercel网站项目的域名设置，改为你的域名保存，等待生效。
- 访问你的域名。
> 最后你可以：删除`README.md`，删除或编辑`index.html`。将自己Github仓库的`myphp`项目设置为私有。
### 说明：
- 这只是一个简单的示例，每次编辑或上传新的php文件到Github仓库的api目录下都会自动构建。构建完成后访问你的域名即可。
### 主要目录文件结构：
```sh
myphp
├── api
│   └── index.php
└── vercel.json
```
### php版本：
默认部署的php版本为8.2.X。编辑`vercel.json`文件可构建不同版本的php环境。
- `vercel-php@0.6.0` - PHP 8.2.x
- `vercel-php@0.5.3` - PHP 8.1.x
- `vercel-php@0.4.1` - PHP 8.0.x
- `vercel-php@0.3.3` - PHP 7.4.x
### 官方仓库：
- https://github.com/vercel-community/php/
