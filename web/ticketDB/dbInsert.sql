INSERT INTO public.restaurant (id, name, address, zip_code, phone)
VALUES ('555555', 'Olive Garden', '2010 S. Burbank', '83566', '2085229769');

INSERT INTO public.user (id, name, job_title, phone)
VALUES ('636366', 'Kristin', 'Manager', '5556667777');

INSERT INTO public.ticket (restaurant_id, user_id, date_created, max_priority, comment)
VALUES ('555555', '636366', '2017-10-11', 'yes', 'I am having problems with everything.');