# بات خوش‌آمدگویی - Welcome Bot

یک بات ساده خوش‌آمدگویی به زبان PHP با پشتیبانی از زبان فارسی

A simple welcome bot in PHP with Persian (Farsi) language support

## ویژگی‌ها - Features

- ✨ پیام‌های خوش‌آمدگویی متنوع به زبان فارسی
- 👤 خوش‌آمدگویی شخصی‌سازی شده با نام کاربر
- 🔧 قابلیت افزودن پیام‌های سفارشی
- 📱 قابل استفاده در CLI و محیط وب
- 🔒 حفاظت در برابر حملات XSS با escape کردن خودکار HTML
- 🎯 کد ساده و قابل توسعه

## نصب و استفاده - Installation & Usage

### نیازمندی‌ها - Requirements

- PHP 7.0 or higher

### استفاده - Usage

#### 1. استفاده مستقیم - Direct Usage

```bash
php welcome_bot.php
```

#### 2. استفاده در کد PHP - Use in PHP Code

```php
<?php
require_once 'welcome_bot.php';

// ایجاد نمونه از بات
$bot = new WelcomeBot();

// دریافت پیام تصادفی
echo $bot->getRandomWelcome();

// خوش‌آمدگویی به کاربر خاص
echo $bot->greetUser('علی');

// افزودن پیام سفارشی
$bot->addMessage('پیام سفارشی شما');
?>
```

#### 3. مشاهده مثال‌ها - View Examples

```bash
php example.php
```

#### 4. اجرای تست‌ها - Run Tests

```bash
php test.php
```

## API Documentation

### متدها - Methods

#### `getRandomWelcome()`
دریافت یک پیام خوش‌آمدگویی تصادفی

Returns a random welcome message

```php
$message = $bot->getRandomWelcome();
```

#### `greetUser($name, $escapeHtml = true)`
خوش‌آمدگویی به کاربر با نام مشخص

Greet a specific user by name (with automatic HTML escaping for security)

```php
$greeting = $bot->greetUser('محمد');
// برای محیط‌های غیر وب می‌توانید escaping را غیرفعال کنید
$greeting = $bot->greetUser('محمد', false);
```

#### `getAllMessages()`
دریافت لیست تمام پیام‌های خوش‌آمدگویی

Get all available welcome messages

```php
$messages = $bot->getAllMessages();
```

#### `addMessage($message, $escapeHtml = true)`
افزودن پیام سفارشی جدید

Add a custom welcome message (with automatic HTML escaping for security)

```php
$bot->addMessage('پیام جدید شما');
// برای محیط‌های غیر وب می‌توانید escaping را غیرفعال کنید
$bot->addMessage('پیام جدید شما', false);
```

## مثال‌ها - Examples

### استفاده در وب - Web Usage

```php
<?php
require_once 'welcome_bot.php';
$bot = new WelcomeBot();
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>خوش آمدید</title>
</head>
<body>
    <h1><?php echo $bot->getRandomWelcome(); ?></h1>
</body>
</html>
```

### استفاده در CLI - CLI Usage

```php
<?php
require_once 'welcome_bot.php';
$bot = new WelcomeBot();

foreach (['علی', 'فاطمه', 'حسین'] as $user) {
    echo $bot->greetUser($user) . "\n";
}
?>
```

## امنیت - Security

این بات دارای ویژگی‌های امنیتی زیر است:

- **حفاظت از XSS**: تمام ورودی‌های کاربر به صورت خودکار escape می‌شوند
- **Escape پیش‌فرض**: متدهای `greetUser()` و `addMessage()` به صورت پیش‌فرض HTML را escape می‌کنند
- **کنترل دستی**: در صورت نیاز می‌توانید با پارامتر `escapeHtml = false` این قابلیت را غیرفعال کنید

This bot includes the following security features:

- **XSS Protection**: All user inputs are automatically escaped
- **Default Escaping**: Methods `greetUser()` and `addMessage()` escape HTML by default
- **Manual Control**: You can disable escaping with `escapeHtml = false` parameter if needed

## مشارکت - Contributing

مشارکت‌ها استقبال می‌شود! لطفاً Pull Request ارسال کنید.

Contributions are welcome! Please submit a Pull Request.

## مجوز - License

این پروژه آزاد و متن‌باز است.

This project is free and open-source.