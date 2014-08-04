SELECT COUNT(*)
FROM sales_table
WHERE (sales_date BETWEEN '2014-06-01 00:00:00' AND '2014-06-05 23:59:59')

SELECT DISTINCT c.customer_first_name, c.customer_last_name
FROM customer_table c, sales_table s
WHERE s.sales_amount > 200;

