# **Inkafarma website**
In this project I managed to learn a lot about how database connections work using PHP, using the MVC design pattern, using Ajax and JQuery. I also managed to implement libraries using Composer. Use the bootstrap css framework.

The system allows you to view a catalog of products from a database. Users can register and make simulated purchases.

The system has an intranet with login (localhost/inkafarma/administracion/)

Within the intranet you can perform CRUDs of:
- Products
- Categories
- Suppliers
- Employees

It also allows you to view sales and a list of registered users. As an addition, the ability to export tables in PDF, EXCEL was implemented.

#### Dashboard
![inkafarma-intranet-dashboard.png](https://i.ibb.co/23rLv98/inkafarma-intranet-dashboard.png)
#### Shop
![inkafarma-users-shop.png](https://i.ibb.co/q0VtQYm/inkafarma-users-shop.png)
#### CRUD Products
![inkafarma-intranet-products.png](https://i.ibb.co/J7mw6fh/inkafarma-intranet-products.png)
## Database installation

The table is generated automatically, but you must create the MySQL database with the name 'inkafarma'

```sql
  CREATE DATABASE inkafarma;
```
#

> [!NOTE]
> This project does not make real purchases, only simulated ones. Developed in the 5th cycle of the Systems Engineering degree at UTP