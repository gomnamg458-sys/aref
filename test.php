<?php
/**
 * Test suite for Welcome Bot
 * مجموعه تست برای بات خوش‌آمدگویی
 */

require_once 'welcome_bot.php';

function test($name, $condition, $message = '') {
    if ($condition) {
        echo "✅ PASS: $name\n";
        return true;
    } else {
        echo "❌ FAIL: $name";
        if ($message) {
            echo " - $message";
        }
        echo "\n";
        return false;
    }
}

echo "=== Running Welcome Bot Tests ===\n\n";

$passed = 0;
$failed = 0;

// Test 1: Bot instantiation
$bot = new WelcomeBot();
if (test("Bot instantiation", $bot instanceof WelcomeBot)) {
    $passed++;
} else {
    $failed++;
}

// Test 2: getRandomWelcome returns a string
$welcome = $bot->getRandomWelcome();
if (test("getRandomWelcome returns string", is_string($welcome) && !empty($welcome))) {
    $passed++;
} else {
    $failed++;
}

// Test 3: greetUser returns personalized message
$greeting = $bot->greetUser('علی');
if (test("greetUser returns personalized message", strpos($greeting, 'علی') !== false)) {
    $passed++;
} else {
    $failed++;
}

// Test 4: XSS protection in greetUser
$greeting = $bot->greetUser('<script>alert("xss")</script>');
if (test("greetUser escapes HTML", strpos($greeting, '&lt;script&gt;') !== false && strpos($greeting, '<script>') === false)) {
    $passed++;
} else {
    $failed++;
}

// Test 5: XSS protection can be disabled
$greeting = $bot->greetUser('<b>Test</b>', false);
if (test("greetUser can disable escaping", strpos($greeting, '<b>Test</b>') !== false)) {
    $passed++;
} else {
    $failed++;
}

// Test 6: getAllMessages returns array
$messages = $bot->getAllMessages();
if (test("getAllMessages returns array", is_array($messages) && count($messages) > 0)) {
    $passed++;
} else {
    $failed++;
}

// Test 7: addMessage adds a message
$initialCount = count($bot->getAllMessages());
$bot->addMessage('تست پیام جدید');
$newCount = count($bot->getAllMessages());
if (test("addMessage adds a message", $newCount === $initialCount + 1)) {
    $passed++;
} else {
    $failed++;
}

// Test 8: addMessage escapes HTML
$bot->addMessage('<img src=x onerror=alert(1)>');
$messages = $bot->getAllMessages();
$lastMessage = end($messages);
if (test("addMessage escapes HTML", strpos($lastMessage, '&lt;img') !== false && strpos($lastMessage, '<img') === false)) {
    $passed++;
} else {
    $failed++;
}

// Test 9: addMessage can disable escaping
$bot->addMessage('<em>تاکید</em>', false);
$messages = $bot->getAllMessages();
$lastMessage = end($messages);
if (test("addMessage can disable escaping", strpos($lastMessage, '<em>تاکید</em>') !== false)) {
    $passed++;
} else {
    $failed++;
}

// Test 10: Default messages are in Persian
$allMessages = $bot->getAllMessages();
$hasPersian = false;
foreach ($allMessages as $msg) {
    // Check for Persian characters (Unicode range)
    if (preg_match('/[\x{0600}-\x{06FF}]/u', $msg)) {
        $hasPersian = true;
        break;
    }
}
if (test("Default messages contain Persian text", $hasPersian)) {
    $passed++;
} else {
    $failed++;
}

echo "\n=== Test Summary ===\n";
echo "Passed: $passed\n";
echo "Failed: $failed\n";
echo "Total:  " . ($passed + $failed) . "\n";

if ($failed === 0) {
    echo "\n✅ All tests passed!\n";
    exit(0);
} else {
    echo "\n❌ Some tests failed!\n";
    exit(1);
}
?>
