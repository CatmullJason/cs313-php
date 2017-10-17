INSERT INTO public.restaurant (restaurant_id, name, address, zip_code, phone)
VALUES ('555555', 'Olive Garden', '2010 S. Burbank', '83566', '2085229769');

INSERT INTO public.user (user_id, name, job_title, phone)
VALUES ('636366', 'Kristin Smith', 'Manager', '5556667777');

INSERT INTO public.ticket (restaurant_id, user_id, date_created, max_priority, comment)
VALUES ('555555', '636366', '2017-10-11', true, 'I am having problems with everything.');

INSERT INTO public.restaurant (restaurant_id, name, address, zip_code, phone)
VALUES ('222222', 'KFC', '2020 S. Anderson', '83567', '2087579022');

INSERT INTO public.user (user_id, name, job_title, phone)
VALUES ('737337', 'Robert Dibbles', 'Manager', '2224446666');

INSERT INTO public.ticket (restaurant_id, user_id, date_created, max_priority, comment)
VALUES ('222222', '737337', '2017-10-14', false, 'This is so much fun!');

INSERT INTO public.ticket (restaurant_id, user_id, date_created, max_priority, comment)
VALUES ('555555', '636366', '2017-10-14', true, 'I am having problems with everything...again.');

INSERT INTO public.restaurant (restaurant_id, name, address, zip_code, phone)
VALUES ('444444', 'McDonalds', '280 E. Eagle Street', '84555', '2085228787');

INSERT INTO public.user (user_id, name, job_title, phone)
VALUES ('637445', 'Johnny McGaff', 'Waiter', '5556885444');

INSERT INTO public.ticket (restaurant_id, user_id, date_created, max_priority, comment)
VALUES ('444444', '637445', '2017-10-13', false, 'I need new coasters ASAP.');
