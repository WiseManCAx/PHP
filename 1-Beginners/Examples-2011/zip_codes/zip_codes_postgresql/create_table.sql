CREATE TABLE zip_code (
   id  serial primary key,
   zip_code  varchar(5) NOT NULL UNIQUE,
   city  varchar(50) default NULL,
   county  varchar(50) default NULL,
   state_name  varchar(50) default NULL,
   state_prefix  varchar(2) default NULL,
   area_code  varchar(3) default NULL,
   time_zone  varchar(50) default NULL,
   lat  float NOT NULL,
   lon  float NOT NULL
)
