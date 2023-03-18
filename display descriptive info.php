SELECT o.order_id, o.date_ordered, u.username, p.item_name, SUM(o.item_qty * p.item_price) as total_amount 
FROM orders o
JOIN users u 
    ON o.user_id = u.user_id
JOIN products p 
    ON o.item_id = p.item_id
GROUP BY o.order_id;
