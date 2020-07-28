# dhl-invoice

## url

```http://dhl-invoice.intricateinlays.com/
```

## parameter

The site needs an invoice parameter and format is below

```
{
   "company_name":"Juan Dela Cruz",
   "company_address":"Cebu City 6000 Philippines",
   "company_contact":"09228112233 \/ juan@mailinator.com",
   "customer_name":"Maria Dela Cruz",
   "customer_address":"CA 90291 United States",
   "customer_phone":"8057112233",
   "customer_email":"maria@mailinator.com",
   "invoice_items":[
      {
         "quantity":"1",
         "description":"Fashion accessory inlay sterling silver ring with turquoise, lab opal and mother of pearl",
         "country_of_origin":"PHILIPPINES",
         "price":100
      }
   ],
   "gross_weight":"1\/4 KG"
}
```

## example

```
http://dhl-invoice.intricateinlays.com/?invoice={%20%22company_name%22:%22Juan%20Dela%20Cruz%22,%20%22company_address%22:%22Cebu%20City%206000%20Philippines%22,%20%22company_contact%22:%2209228112233%20\/%20juan@mailinator.com%22,%20%22customer_name%22:%22Maria%20Dela%20Cruz%22,%20%22customer_address%22:%22CA%2090291%20United%20States%22,%20%22customer_phone%22:%228057112233%22,%20%22customer_email%22:%22maria@mailinator.com%22,%20%22invoice_items%22:[%20{%20%22quantity%22:%221%22,%20%22description%22:%22Fashion%20accessory%20inlay%20sterling%20silver%20ring%20with%20turquoise,%20lab%20opal%20and%20mother%20of%20pearl%22,%20%22country_of_origin%22:%22PHILIPPINES%22,%20%22price%22:100%20}%20],%20%22gross_weight%22:%221\/4%20KG%22%20}
```
