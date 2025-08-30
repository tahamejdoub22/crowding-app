# Crowdfunding Platform API Documentation

## Overview

This API provides endpoints for a crowdfunding platform with authentication, project management, and role-based access control. The API uses Laravel Sanctum for authentication and supports both traditional web forms and modern API interactions.

## Base URL

```
http://your-domain.com/api/v1
```

## Authentication

The API uses Bearer token authentication with Laravel Sanctum. Include the token in the Authorization header:

```
Authorization: Bearer your-token-here
```

## API Integration with Blade Templates

The API can work seamlessly with existing Blade templates. Add `?api=true` to any form URL or include `data-use-api="true"` in your form element to enable API mode for enhanced user experience.

---

## Authentication Endpoints

### Register User

**POST** `/auth/register`

Create a new user account with role assignment.

#### Request Body
```json
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password123",
  "password_confirmation": "password123",
  "role_id": "projectinvestor"
}
```

#### Available Roles
- `admin` - Full system access
- `projectresponsable` - Project management capabilities
- `projectinvestor` - Investment and backing capabilities

#### Response (201 Created)
```json
{
  "status": "success",
  "message": "User registered successfully",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "roles": ["projectinvestor"],
      "created_at": "2025-08-24T12:00:00.000000Z"
    },
    "access_token": "1|token-string-here",
    "token_type": "Bearer"
  }
}
```

#### Error Response (422 Validation Failed)
```json
{
  "status": "error",
  "message": "Validation failed",
  "errors": {
    "email": ["The email has already been taken."]
  }
}
```

---

### Login User

**POST** `/auth/login`

Authenticate a user and receive an access token.

#### Request Body
```json
{
  "email": "john@example.com",
  "password": "password123"
}
```

#### Response (200 OK)
```json
{
  "status": "success",
  "message": "Login successful",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "roles": ["projectinvestor"],
      "permissions": [
        "payments-create",
        "comment-create",
        "comment-read",
        "comment-update",
        "updates-read",
        "team-read",
        "testimonials-read",
        "project-read"
      ]
    },
    "access_token": "2|new-token-string-here",
    "token_type": "Bearer"
  }
}
```

#### Error Response (401 Unauthorized)
```json
{
  "status": "error",
  "message": "Invalid credentials"
}
```

---

### Get Current User

**GET** `/auth/me` 🔒

Get information about the currently authenticated user.

#### Headers
```
Authorization: Bearer your-token-here
```

#### Response (200 OK)
```json
{
  "status": "success",
  "data": {
    "user": {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "email_verified_at": null,
      "roles": ["projectinvestor"],
      "permissions": ["payments-create", "comment-create"],
      "created_at": "2025-08-24T12:00:00.000000Z",
      "updated_at": "2025-08-24T12:00:00.000000Z"
    }
  }
}
```

---

### Refresh Token

**POST** `/auth/refresh` 🔒

Refresh the current access token.

#### Response (200 OK)
```json
{
  "status": "success",
  "message": "Token refreshed successfully",
  "data": {
    "access_token": "3|refreshed-token-string-here",
    "token_type": "Bearer"
  }
}
```

---

### Logout

**POST** `/auth/logout` 🔒

Invalidate the current access token.

#### Response (200 OK)
```json
{
  "status": "success",
  "message": "Logged out successfully"
}
```

---

## Project Management Endpoints

### Get All Projects

**GET** `/projects`

Retrieve a paginated list of all projects.

#### Query Parameters
- `page` (optional) - Page number for pagination

#### Response (200 OK)
```json
{
  "status": "success",
  "data": {
    "current_page": 1,
    "data": [
      {
        "id": 1,
        "project_name": "Smart Home IoT Platform",
        "project_location": "Silicon Valley, CA",
        "project_description": "A comprehensive IoT platform...",
        "start_date": "2025-09-01",
        "end_date": "2025-12-31",
        "goal": "75000.00",
        "pledged": "0.00",
        "investors": 0,
        "image": "default-project.jpg",
        "user_id": 3,
        "created_at": "2025-08-24T12:23:39.000000Z",
        "updated_at": "2025-08-24T12:23:39.000000Z",
        "user": {
          "id": 3,
          "name": "API Test User",
          "email": "apitestuser@example.com"
        },
        "rewards": [],
        "comments": [],
        "updates": []
      }
    ],
    "per_page": 10,
    "total": 1
  }
}
```

---

### Get Single Project

**GET** `/projects/{id}`

Retrieve detailed information about a specific project.

#### Response (200 OK)
```json
{
  "status": "success",
  "data": {
    "id": 1,
    "project_name": "Smart Home IoT Platform",
    "project_location": "Silicon Valley, CA",
    "project_description": "A comprehensive IoT platform for smart home automation with advanced AI features for energy optimization and security monitoring.",
    "start_date": "2025-09-01",
    "end_date": "2025-12-31",
    "goal": "75000.00",
    "pledged": "0.00",
    "investors": 0,
    "image": "default-project.jpg",
    "user_id": 3,
    "created_at": "2025-08-24T12:23:39.000000Z",
    "updated_at": "2025-08-24T12:23:39.000000Z",
    "user": {
      "id": 3,
      "name": "API Test User",
      "email": "apitestuser@example.com"
    },
    "rewards": [],
    "comments": [],
    "updates": []
  }
}
```

---

### Create Project

**POST** `/projects` 🔒

Create a new crowdfunding project.

#### Request Body
```json
{
  "project_name": "Smart Home IoT Platform",
  "project_description": "A comprehensive IoT platform for smart home automation with advanced AI features for energy optimization and security monitoring.",
  "project_location": "Silicon Valley, CA",
  "goal": 75000,
  "start_date": "2025-09-01",
  "end_date": "2025-12-31",
  "image": "project-image.jpg"
}
```

#### Field Validation
- `project_name` - Required, string, max 255 characters
- `project_description` - Required, string
- `project_location` - Required, string
- `goal` - Required, numeric, minimum 1
- `start_date` - Required, date, today or later
- `end_date` - Required, date, after start_date
- `image` - Optional, string

#### Response (201 Created)
```json
{
  "status": "success",
  "message": "Project created successfully",
  "data": {
    "project_name": "Smart Home IoT Platform",
    "project_description": "A comprehensive IoT platform...",
    "project_location": "Silicon Valley, CA",
    "goal": 75000,
    "start_date": "2025-09-01",
    "end_date": "2025-12-31",
    "user_id": 3,
    "pledged": 0,
    "investors": 0,
    "image": "project-image.jpg",
    "updated_at": "2025-08-24T12:23:39.000000Z",
    "created_at": "2025-08-24T12:23:39.000000Z",
    "id": 1
  }
}
```

---

### Update Project

**PUT** `/projects/{id}` 🔒

Update an existing project. Only the project owner can update their project.

#### Request Body
```json
{
  "project_name": "Updated Project Name",
  "goal": 100000
}
```

#### Response (200 OK)
```json
{
  "status": "success",
  "message": "Project updated successfully",
  "data": {
    // Updated project data
  }
}
```

---

### Delete Project

**DELETE** `/projects/{id}` 🔒

Delete a project. Only the project owner can delete their project.

#### Response (200 OK)
```json
{
  "status": "success",
  "message": "Project deleted successfully"
}
```

---

## Error Responses

### Common HTTP Status Codes

- **200 OK** - Request successful
- **201 Created** - Resource created successfully
- **401 Unauthorized** - Authentication required or failed
- **403 Forbidden** - Access denied
- **404 Not Found** - Resource not found
- **422 Unprocessable Entity** - Validation failed
- **500 Internal Server Error** - Server error

### Error Response Format

```json
{
  "status": "error",
  "message": "Error description",
  "errors": {
    "field_name": ["Specific validation error"]
  }
}
```

---

## JavaScript Integration Examples

### Using the Built-in API Client

The application includes a JavaScript API client accessible via `window.api`:

```javascript
// Register a new user
try {
  const response = await window.api.register({
    name: 'John Doe',
    email: 'john@example.com',
    password: 'password123',
    password_confirmation: 'password123',
    role_id: 'projectinvestor'
  });
  console.log('Registration successful:', response);
} catch (error) {
  console.error('Registration failed:', error);
}

// Login
try {
  const response = await window.api.login({
    email: 'john@example.com',
    password: 'password123'
  });
  console.log('Login successful:', response);
} catch (error) {
  console.error('Login failed:', error);
}

// Get current user
try {
  const response = await window.api.getUser();
  console.log('User info:', response);
} catch (error) {
  console.error('Failed to get user:', error);
}

// Create a project
try {
  const response = await window.api.createProject({
    project_name: 'My New Project',
    project_description: 'Project description',
    project_location: 'Location',
    goal: 50000,
    start_date: '2025-09-01',
    end_date: '2025-12-31'
  });
  console.log('Project created:', response);
} catch (error) {
  console.error('Project creation failed:', error);
}
```

### Blade Template Integration

Enable API mode in your forms by adding the `data-use-api` attribute:

```html
<!-- Login form with API integration -->
<form method="POST" action="{{ route('login') }}" data-use-api="true">
    @csrf
    <input type="email" name="email" required>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
</form>

<!-- Or use query parameter -->
<form method="POST" action="{{ route('register') }}?api=true">
    <!-- Form fields -->
</form>
```

---

## Rate Limiting

The API includes rate limiting to prevent abuse:

- **Authentication endpoints**: 5 attempts per minute
- **General API endpoints**: 60 requests per minute per user

Rate limit headers are included in responses:

```
X-RateLimit-Limit: 60
X-RateLimit-Remaining: 59
X-RateLimit-Reset: 1640995200
```

---

## CORS Support

The API supports Cross-Origin Resource Sharing (CORS) for web applications. Ensure your frontend domain is configured in the Laravel CORS settings.

---

## Security Features

- **CSRF Protection**: Enabled for web routes
- **Token-based Authentication**: Using Laravel Sanctum
- **Role-based Access Control**: Using Laratrust
- **Input Validation**: Comprehensive validation for all endpoints
- **Password Hashing**: Using bcrypt
- **SQL Injection Prevention**: Using Eloquent ORM

---

## Testing Examples

### cURL Examples

```bash
# Register
curl -X POST http://your-domain.com/api/v1/auth/register \
  -H "Content-Type: application/json" \
  -d '{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "password123",
    "password_confirmation": "password123",
    "role_id": "projectinvestor"
  }'

# Login
curl -X POST http://your-domain.com/api/v1/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "john@example.com",
    "password": "password123"
  }'

# Get projects
curl -X GET http://your-domain.com/api/v1/projects \
  -H "Accept: application/json"

# Create project (requires authentication)
curl -X POST http://your-domain.com/api/v1/projects \
  -H "Content-Type: application/json" \
  -H "Authorization: Bearer your-token-here" \
  -d '{
    "project_name": "My Project",
    "project_description": "Description",
    "project_location": "Location",
    "goal": 50000,
    "start_date": "2025-09-01",
    "end_date": "2025-12-31"
  }'
```

---

## Changelog

### Version 1.0.0 (2025-08-24)
- Initial API release
- Authentication endpoints with role-based access
- Project management CRUD operations
- Blade template integration
- Comprehensive error handling and validation
- API documentation

---

For more information or support, please contact the development team.