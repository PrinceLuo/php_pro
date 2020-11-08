# php_pro
Promote your PHP technique

/* Note for the tutorial project 20200908 */

cmd: composer init

in composer.json
set require
set autoload

cmd:composer update


总结：IOC本质就是通过一个数组或集合的方式对于框架及项目中所运用实例对象，进行统一管理，在IOC容器的实例对象会存在bind和make的方法来对容器进行操作；这样有利于代码扩展和维护，以及复用
就是把 new 实例对象的方式交由IOC来管理避免对象重复创建实例，再配合 DI 方法中约束泛型进行依赖注入

容器对于势力对象解析
1. 闭包 --> 直接判断运行
2. 实例对象 --> 直接return
3. 地址 --> 通过反射 解析实例对象 new object （因为这个object 构造函数中

/* Note for the tutorial project 20200921 */
助手函数添加：
    1. 添加helper（例子中在Support里添加，实际按需，在需要用到助手韩式的地方路径添加）
    2. 修改composer.json，在autoload里（查看格式）
    3. 运行composer update
    
/* Note for the frame established */
在 frame路径下：
    1. composer init(princeluo/laravelstar-frame)
    2. composer.json 底下，编写autoload
    3. 运行 composer update
    4. composer.json 底下，编写repositories
    5. 运行 composer require princeluo/laravelstar:master-dev
  
/* Note for the Contracts */
使用契约，规范数据库工具函数
  
    