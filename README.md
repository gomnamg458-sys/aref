# بات خوش‌آمدگویی - Welcome Bot

یک بات ساده خوش‌آمدگویی به زبان PHP با پشتیبانی از زبان فارسی

A simple welcome bot in PHP with Persian (Farsi) language support

## ویژگی‌ها - Features

- ✨ پیام‌های خوش‌آمدگویی متنوع به زبان فارسی
- 👤 خوش‌آمدگویی شخصی‌سازی شده با نام کاربر
- 🔧 قابلیت افزودن پیام‌های سفارشی
- 📱 قابل استفاده در CLI و محیط وب
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

## API Documentation

### متدها - Methods

#### `getRandomWelcome()`
دریافت یک پیام خوش‌آمدگویی تصادفی

Returns a random welcome message

```php
$message = $bot->getRandomWelcome();
```

#### `greetUser($name)`
خوش‌آمدگویی به کاربر با نام مشخص

Greet a specific user by name

```php
$greeting = $bot->greetUser('محمد');
```

#### `getAllMessages()`
دریافت لیست تمام پیام‌های خوش‌آمدگویی

Get all available welcome messages

```php
$messages = $bot->getAllMessages();
```

#### `addMessage($message)`
افزودن پیام سفارشی جدید

Add a custom welcome message

```php
$bot->addMessage('پیام جدید شما');
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

## مشارکت - Contributing

مشارکت‌ها استقبال می‌شود! لطفاً Pull Request ارسال کنید.

Contributions are welcome! Please submit a Pull Request.

## مجوز - License

این پروژه آزاد و متن‌باز است.

This project is free and open-source.