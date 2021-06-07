
# Plāni

### Plāna imports

Nepieciešams sagatavot importa failu pēc parauga, kas norādīts attiecīgajā datnē

### Datubāzes struktūra

Plāni (plan)

```sql
id | name             | year    | info    || timestamps()
..
1  | Elektrotehniķis  | 2019    | `json`  || ~
```

Plāna dati (plan_data)

```mysql
id | plan_id | module_id | code |  ~ || timestamps()
..
2  |  1      |  14       | ET1  | 
```

Plāna sadalījums (plan_distribution)

```sql
id | plan_data_id | course | theory | practice ||   timestamps()
..
3  | 34           | 1      |  80    |  44      ||   ~
4  | 34           | 2      |   0    |   0      ||   ~
```

# Žurnālfaili


# Tiesības

Tiesības realizētas pēc CRUD principa, kur x ir atbilstošā sadaļa/funkcionalitāte

x-list , x-create , x-edit , x-delete

