# Software-Creating
This project is for our class.

刘科成 118037910034
姚倚森 118037910065
葛续荣 118037910049

we use Jenkins to build a CI/CD pipline.There is a short description about it.

版本号：Jenkins 2.164.1 java version "1.8.0_181"
需要注意，Jenkins不支持java9和java11.
安装：
1.官网上给了两种安装方式，一种是各个系统的installer，一种是普通的.war文件。windows的话直接安装windows installer那种就好，自动安装。

2.然后浏览器输入http://localhost:8080。

3.第一次进去需要密码，密码在安装目录下的jenkins.err.log文件里。如下：

Jenkins initial setup is required. An admin user has been created and a password generated.
Please use the following password to proceed to installation:

b5adfa35e63143c0a0c4558096763bcf

This may also be found at: D:\Program Files (x86)\Jenkins\secrets\initialAdminPassword
4.然后开始下载推荐插件。

5.当下一次准备打开Jenkins的时候，需要先在控制台把Jenkins开起来，java -jar jenkins.war。


配置：

1.系统管理--全局工具配置--git 部分，可能会显示找不到git.exe，需要手动指定一下目录。

2.新建一个任务，选择free style模式。

3.在配置页面中，源码管理选择git，然后添加github上的仓库地址。保存。如果没有意外的话，点击立即构建，即可发现Jenkins开始自动地从git拉取代码，进行编译了。在测试中编译的是一个Java项目。

4.也可以选择pipeline模式，定义流水线脚本。

node('master') {
    // some block
    git 'https://github.com/yourgit/test.git'
}。

根据自定义的流水线脚本，可以做到让Jenkins自动从github上拉取代码，编译，测试，部署等步骤。
