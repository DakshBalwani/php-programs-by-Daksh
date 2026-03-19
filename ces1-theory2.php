1. date()

Used to format date and time

Example:

echo date("d-m-Y");

👉 Output: 19-03-2026

2. time()

Returns current timestamp

echo time();
3. strtotime()

Converts string into timestamp

echo strtotime("next Sunday");
4. mktime()

Creates timestamp from given date

echo mktime(0, 0, 0, 3, 19, 2026);
5. date_default_timezone_set()

Sets timezone

date_default_timezone_set("Asia/Kolkata");
echo date("h:i:s A");