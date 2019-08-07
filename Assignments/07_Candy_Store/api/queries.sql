
/* getting all candy types */
SELECT distinct(type) FROM `candy` ORDER BY `candy`.`type` ASC;

/* pagination*/
SELECT * FROM `candy` order by price desc limit 0 , 10;

SELECT type,count(type) FROM `candy` group by type order by count(type) desc

SELECT * FROM `candy` where title like "%sour%"

SELECT * FROM `candy` where price >= 15.99 and price <= 24.99