# Schema migration

Schema migration that we're talking about here is to update or revert database schema.
It is different to database migration, which means to move database between platforms when we re-develop a system.

We've used Yii2 migration to create database tables in the lesson [Create DB schema, model, CRUD](../crud/README.md#create-tables-using-migration)

In that day, our database structure were simple.

![old erd](../crud/images/ERD.png)

Now we decide that we will change the database structure

![new erd](./images/ERD.png)

The reasons that we want to change the database structure are:
