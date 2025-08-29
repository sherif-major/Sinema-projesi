# Roadmap

## Tabloları oluşturma

### 1. movies (Filmler)

```sql
id (Primary Key)
title (varchar 200)
description (text)
duration (integer)
genre (varchar 100)
rating (varchar 10)
director (varchar 100)
cast (text)
poster_image (varchar 255)
trailer_url (varchar 255)
release_date (date)
is_active (boolean)
created_at (timestamp)
updated_at (timestamp)
```

### 2. halls (Salonlar)

```sql
id (Primary Key)
name (varchar 100)
capacity (integer)
row_count (integer)
seats_per_row (integer)
hall_type (enum)
screen_type (varchar 50)
sound_system (varchar 50)
is_active (boolean)
created_at (timestamp)
updated_at (timestamp)
```

### 3. showtimes (Gösterimler)

```sql
id (Primary Key)
movie_id (Foreign Key)
hall_id (Foreign Key)
show_date (date)
show_time (time)
base_price (decimal 8,2)
vip_price (decimal 8,2)
available_seats (integer)
is_active (boolean)
created_at (timestamp)
updated_at (timestamp)
```

### 4. seats (Koltuklar)

```sql
id (Primary Key)
hall_id (Foreign Key)
row_number (varchar 5)
seat_number (integer)
seat_type (enum)
is_active (boolean)
created_at (timestamp)
updated_at (timestamp)
```

### 5. bookings (Rezervasyonlar)

```sql
id (Primary Key)
showtime_id (Foreign Key)
customer_name (varchar 100)
customer_email (varchar 255)
customer_phone (varchar 20)
total_price (decimal 8,2)
booking_status (enum)
booking_code (varchar 20)
payment_method (varchar 50)
payment_status (enum)
qr_code (varchar 255)
created_at (timestamp)
updated_at (timestamp)
```

### 6. booking_seats (Rezervasyon Koltukları)

```sql
id (Primary Key)
booking_id (Foreign Key)
seat_id (Foreign Key)
seat_price (decimal 8,2)
created_at (timestamp)
updated_at (timestamp)
```

