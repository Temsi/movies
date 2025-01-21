## MOVIE ORDERS

# To run:

> composer install
>
> npm install
>
> composer run dev

### Server Address:
http://127.0.0.1:8000

### URL with API Route Prefix:
http://127.0.0.1:8000/api/v1

### Endpoints:

>POST    /order
>>accepts a json array of ids, e.g.
>>>{"movies": [9,7]}
>>
>>returns a json of the inserted order

> 
>
>GET     /order/{orderId}
> 
>returns the info for the order ID specified in the url
>

>GET    /movie/{movieId}
> 
>returns the info for the movie ID specified in the url
> 

>GET    /movie/{movieId}/order
> 
>returns the orders for the movie ID specified in the url
