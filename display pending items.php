SELECT p.item_id, p.item_name, o.item_qty, u.username, u.user_status, o.date_ordered, o.order_status
FROM orders o
JOIN users u 
    ON o.user_id = u.user_id
JOIN products p 
    ON o.item_id = p.item_id
WHERE u.user_status = 'A'
AND p.item_status = 'A'
AND o.order_status = 'P'
AND o.date_ordered >= '2023-01-01'
GROUP BY o.order_id;
