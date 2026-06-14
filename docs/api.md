# Dokumentasi API Inventory - v1

## 1. Otentikasi (Auth)

### Register User Baru
* **URL:** `/api/v1/register`
* **Method:** `POST`
* **Headers:** * `Accept: application/json`
  * `Content-Type: application/json`
* **Request Body:**
```json
{
  "name": "Rahmi Hamka",
  "email": "rahmi@example.com",
  "password": "password123",
  "password_confirmation": "password123"
}