CREATE ROLE customer WITH LOGIN PASSWORD 'customer123';
GRANT CONNECT ON DATABASE ''TO viewer;

CREATE ROLE manager WITH LOGIN PASSWORD 'manager123';
CREATE ROLE employee WITH LOGIN PASSWORD 'employee123';

select * from users
select * from cameras
select * from payments

-- EMPLOYEE PERMISSION
GRANT UPDATE (status, updated_at) ON payments TO employee;
grant select on payments to employee
grant select on users to employee

grant insert on activity_logs to employee;
GRANT USAGE, SELECT ON SEQUENCE activity_logs_log_id_seq TO employee;


-- MANAGER PERMISSION
grant select on users to manager
grant select on cameras to manager
grant insert on cameras to manager
grant delete on cameras to manager
GRANT USAGE, SELECT ON SEQUENCE public.cameras_camera_id_seq TO manager;
grant select on rejected_rent, pending_rent,accepted_rent to manager
grant insert on activity_logs to manager
GRANT USAGE, SELECT ON SEQUENCE activity_logs_log_id_seq TO manager;


-- CUSTOMER PERMISSION
GRANT SELECT ON TABLE users TO customer; 
grant select on cameras to customer
grant insert on payments to customer
grant select on cameras
GRANT USAGE, SELECT ON SEQUENCE public.payments_id_seq TO customer;
grant select on payments to customer;

grant insert on activity_logs to customer
GRANT USAGE, SELECT ON SEQUENCE activity_logs_log_id_seq TO customer;



update users set role_id = 3 where id=2

create view rejected_rent as
select count(*) as total_rejected
from payments
where status = 'reject'

create view pending_rent as
select count(*) as total_pending
from payments
where status = 'pending'

create view accepted_rent as
select count(*) as total_accepted
from payments
where status = 'accept'


select * from accepted_rent


CREATE OR REPLACE FUNCTION get_pending_rent()
RETURNS TABLE(user_id BIGINT, user_name varchar, camera_name varchar, total_price NUMERIC) AS $$ 
BEGIN
    RETURN QUERY 
    SELECT 
        p.user_id, 
        u.name AS user_name, -- Fetch user name from the `users` table
        p.camera_name, 
        p.total_price  
    FROM 
        payments p
    JOIN 
        users u ON p.user_id = u.id -- Ensure proper join with the `users` table
    WHERE 
        p.status = 'pending';
END;
$$ LANGUAGE plpgsql;

SELECT * FROM get_pending_rent();


select * from cameras

grant update on cameras to manager;
grant delete on users to manager;




CREATE MATERIALIZED VIEW rentals_summary AS
SELECT 
    c.camera_category,
    COUNT(p.id) AS total_rentals,
    SUM(p.total_price) AS total_revenue
FROM payments p
JOIN cameras c ON p.camera_id = c.camera_id
WHERE p.status = 'accept'
GROUP BY c.camera_category;


select * from activity_logs


CREATE OR REPLACE FUNCTION log_activity()
RETURNS TRIGGER AS $$
BEGIN
    INSERT INTO activity_logs (action, table_name, changed_at, user_type)
    VALUES (TG_OP, TG_TABLE_NAME, NOW(), CURRENT_USER);
    RETURN NEW;
END;
$$ LANGUAGE PLPGSQL;

CREATE TRIGGER log_payments_changes
AFTER INSERT OR UPDATE OR DELETE ON payments
FOR EACH ROW
EXECUTE FUNCTION log_activity();

CREATE TRIGGER log_cameras_changes
AFTER INSERT OR UPDATE OR DELETE ON cameras
FOR EACH ROW
EXECUTE FUNCTION log_activity();

CREATE TRIGGER log_users_changes
AFTER INSERT OR UPDATE OR DELETE ON users
FOR EACH ROW
EXECUTE FUNCTION log_activity();


select * from users









