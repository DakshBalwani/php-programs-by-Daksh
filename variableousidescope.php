<!-- what do you mean by scope of variable in php?
 explain with example code that what will happen when a variable is accessed outside from its scope and also write the error it will generate -->
<!-- 
📌 Scope of Variable in PHP

Scope defines where a variable can be accessed or used in a program.

In PHP, variables have mainly 3 types of scope:

Local Scope
Global Scope
Static Scope
🔹 1. Local Scope

A variable declared inside a function can only be used within that function.

✅ Example: -->
<!-- <?php
function test() {
    $x = 10; // local variable
    echo $x;
}

test();
?> -->
<!-- 
✔ Output:

10
❌ Accessing Local Variable Outside Function
❗ Example: -->
<?php
function test() {
    $x = 10;
}

test();
echo $x; // trying to access outside
?>
<!-- ⚠ What Happens:
$x is not accessible outside the function
PHP will generate an error
❌ Error:
Notice: Undefined variable: x
🔹 2. Global Scope

A variable declared outside any function is called a global variable.

✅ Example:
<?php
$x = 20; // global variable

function test() {
    echo $x; // trying to access global variable
}

test();
?>
⚠ What Happens:
$x is not accessible directly inside function
PHP will generate an error
❌ Error:
Notice: Undefined variable: x
✅ Correct Way to Access Global Variable
✔ Using global keyword:
<?php
$x = 20;

function test() {
    global $x;
    echo $x;
}

test();
?>

✔ Output:

20
🔹 3. Static Scope

A static variable retains its value between function calls.

✅ Example:
<?php
function test() {
    static $x = 0;
    echo $x;
    $x++;
}

test();
test();
test();
?>

✔ Output:

012
🧠 Summary
Scope Type	Defined Where	Accessible Where
Local	Inside function	Only inside function
Global	Outside function	Everywhere (with global)
Static	Inside function	Retains value across calls -->