#!/bin/bash

menu()
{
  echo "Sintax:"
  echo "./ordernow.sh NAME EMAIL"
}


if [ $# -eq 0 ]
then
  menu
  echo 
  sqlite3 orders.db 'select * from orders'
else  
  sqlite3 /tmp/orders.db "insert into orders (name, email) values (\"${1}\", \"${2}\");"
fi