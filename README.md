# myphp
30秒在Vercel构建自己的无服务器php环境并实现国内直连访问。
### 主要目录结构
```sh
myphp
├── api
│   └── index.php
└── vercel.json
```
### 按照以下步骤操作：
- forks本项目
- 为域名添加一条CNAME到cname-china.vercel-dns.com
- 访问https://vercel.com 使用Github账号登陆，选择myphp并构建。
- 构建完成后编辑Vercel的域名设置，等待生效。
- 访问你的域名。
> 最后你可以：删除`README.md`，删除或编辑`index.html`。将自己的`myphp`项目设置为私有。
### 说明
- 这只是一个简单的示例，每次编辑php文件或上传新的php文件到api目录都会自动构建。
### php版本
默认部署的php版本为8.2.X。编辑`vercel.json`文件可构建不同版本的php环境。
- `vercel-php@0.6.0` - PHP 8.2.x
- `vercel-php@0.5.3` - PHP 8.1.x
- `vercel-php@0.4.1` - PHP 8.0.x
- `vercel-php@0.3.3` - PHP 7.4.x
