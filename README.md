# PHP 计算库

[![Build Status](https://travis-ci.org/zhangxiangliang/safe-math.svg?branch=master)](https://travis-ci.org/zhangxiangliang/safe-math)
[![Coverage Status](https://coveralls.io/repos/github/zhangxiangliang/safe-math/badge.svg?branch=master)](https://coveralls.io/github/zhangxiangliang/safe-math?branch=master)

PHP 计算库 依赖 bc 库 对 科学计数法进行处理，PHP 的 bc 库无法对操作数为科学计数法的变量进行计算。PHP 本身变量转化的过程中会丢失精度，例如 `9223372039002345678` 会转化为 `9.2233720390023E+18` 丢失了 `45678`，所以 对于需要大数运算精度要求比较高的计算，推荐数据操作使用字符串。

## 例子
```php
<?php

use NewOne\Math\SafeMath;

SafeMath::add("1", "2");
SafeMath::sub("1", "2");
```

## 方法
##### 加法
```php
SafeMath::add("操作数", "操作数", "精度");
```

##### 减法
```php
SafeMath::sub("操作数1", "操作数2", "精度");
```

##### 乘法
```php
SafeMath::mul("操作数1", "操作数2", "精度");
```

##### 除法
```php
SafeMath::div("操作数1", "操作数2", "精度");
```

##### 乘方
```php
SafeMath::pow("操作数1", "操作数2", "精度");
```

##### 大于
```php
// return true or false
SafeMath::gt("操作数1", "操作数2", "精度");
```

##### 大于等于
```php
// return true or false
SafeMath::gte("操作数1", "操作数2", "精度");
```

##### 小于
```php
// return true or false
SafeMath::lt("操作数1", "操作数2", "精度");
```

##### 小于等于
```php
// return true or false
SafeMath::lte("操作数1", "操作数2", "精度");
```

##### 比较
```php
// return -1 小于、 0 等于、 1 大于
SafeMath::cmp("操作数1", "操作数2", "精度");
```

##### 对科学计算法进行数转字符串
```php
SafeMath::format("操作数", "精度");
```
