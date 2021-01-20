# tes_jagoanhosting_operationalprogrammer
membuat dynamic api dengan laravel lumen

## Result
Get semua data
- Method : Get
- Diakses dengan http://localhost:8000/api/Jaghost
- Response request : 
```json
{
    "limit": 10,
    "current_page": 1,
    "total_row": 5,
    "total_page": 2,
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "firstname": "Maman",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "maman@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20",
                "updated_at": "2021-01-20"
            },
            {
                "id": 2,
                "firstname": "Burhan",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "Burhan@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20",
                "updated_at": "2021-01-20"
            },
            {
                "id": 3,
                "firstname": "Udin",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "Burhan@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20",
                "updated_at": "2021-01-20"
            },
            {
                "id": 4,
                "firstname": "Budi",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "Burhan@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20",
                "updated_at": "2021-01-20"
            },
            {
                "id": 5,
                "firstname": "Bani",
                "lastname": "Toni",
                "gender": "male",
                "status": "banned",
                "email": "Burhan@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20",
                "updated_at": "2021-01-20"
            }
        ],
        "first_page_url": "http://localhost:8000/api/Jaghost?page=1",
        "from": 1,
        "last_page": 2,
        "last_page_url": "http://localhost:8000/api/Jaghost?page=2",
        "links": [
            {
                "url": null,
                "label": "pagination.previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/Jaghost?page=1",
                "label": 1,
                "active": true
            },
            {
                "url": "http://localhost:8000/api/Jaghost?page=2",
                "label": 2,
                "active": false
            },
            {
                "url": "http://localhost:8000/api/Jaghost?page=2",
                "label": "pagination.next",
                "active": false
            }
        ],
        "next_page_url": "http://localhost:8000/api/Jaghost?page=2",
        "path": "http://localhost:8000/api/Jaghost",
        "per_page": 5,
        "prev_page_url": null,
        "to": 5,
        "total": 9
    }
}
```
## Result With Query
Get semua data
- Method : Get
- Diakses dengan http://localhost:8000/api/Jaghost
- Response request : 
```json
{
    "limit": 10,
    "current_page": 1,
    "total_row": 4,
    "total_page": 1,
    "select": null,
    "order": [],
    "data": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "firstname": "Maman",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "maman@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20T00:00:00.000000Z",
                "updated_at": "2021-01-20T00:00:00.000000Z"
            },
            {
                "id": 2,
                "firstname": "Burhan",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "Burhan@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20T00:00:00.000000Z",
                "updated_at": "2021-01-20T00:00:00.000000Z"
            },
            {
                "id": 3,
                "firstname": "Udin",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "Burhan@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20T00:00:00.000000Z",
                "updated_at": "2021-01-20T00:00:00.000000Z"
            },
            {
                "id": 4,
                "firstname": "Budi",
                "lastname": "Rahman",
                "gender": "male",
                "status": "active",
                "email": "Burhan@gmail.com",
                "city": "Bandung",
                "address": "Kuta Rock City",
                "phone": 232323,
                "created_at": "2021-01-20T00:00:00.000000Z",
                "updated_at": "2021-01-20T00:00:00.000000Z"
            }
        ],
        "first_page_url": "http://localhost:8000/api/Jaghost?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://localhost:8000/api/Jaghost?page=1",
        "links": [
            {
                "url": null,
                "label": "pagination.previous",
                "active": false
            },
            {
                "url": "http://localhost:8000/api/Jaghost?page=1",
                "label": 1,
                "active": true
            },
            {
                "url": null,
                "label": "pagination.next",
                "active": false
            }
        ],
        "next_page_url": null,
        "path": "http://localhost:8000/api/Jaghost",
        "per_page": 10,
        "prev_page_url": null,
        "to": 4,
        "total": 4
    },
    "conditions": [
        {
            "type": "whereColumn",
            "data": [
                {
                    "firstname": null
                },
                {
                    "lastname": "rahman"
                }
            ]
        }
    ]
}
```
