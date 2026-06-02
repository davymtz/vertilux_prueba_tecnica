# Prueba Técnica Vertilux

Sistema de gestión de órdenes y dashboard de KPIs desarrollado con una arquitectura SPA (Single Page Application) separando frontend y backend de forma independiente.

## Arquitectura

**SPA Application** - Single Page Application con frontend y backend desacoplados

La aplicación está compuesta por:
- **Laravel 13** como API REST backend
- **Next.js 16** como framework de frontend con App Router
- **PostgreSQL 17** como base de datos
- **Nginx** como servidor web y proxy reverso

### Comunicación

El frontend consume la API REST del backend mediante peticiones HTTP. La autenticación se maneja con Laravel Sanctum utilizando tokens Bearer.

## Stack Tecnológico

### Backend
- **PHP 8.3+**
- **Laravel 13**
- **Laravel Sanctum** - Autenticación API con tokens
- **PostgreSQL 17** - Base de datos
- **Nginx** - Servidor web

### Frontend
- **Next.js 16** (App Router)
- **React 19**
- **TypeScript 5**
- **Tailwind CSS 4**
- **shadcn/ui** - Componentes UI
- **TanStack Query (React Query)** - Manejo de estado del servidor y caching
- **Lucide React** - Iconografía

### Infraestructura
- **Docker** - Containerización
- **pnpm** - Package manager del frontend

## Requisitos Previos

- Docker Desktop instalado
- Docker Compose

## Instalación y Configuración

### 1. Clonar el repositorio

```bash
git clone <repository-url>
cd prueba_tecnica_vertilux
```

### 2. Levantar los contenedores

```bash
docker-compose up -d
```

Esto iniciará los siguientes servicios:
- `laravel-app` - Backend Laravel (puerto 9000 interno)
- `next-app` - Frontend Next.js (puerto 3000)
- `nginx` - Servidor web (puerto 80)
- `postgres` - Base de datos PostgreSQL (puerto 5432)

### 3. Instalar dependencias del backend (Laravel)

```bash
docker-compose exec backend composer install
```

### 4. Configurar Laravel

```bash
# Copiar archivo de entorno
docker-compose exec backend cp .env.example .env

# Generar clave de aplicación
docker-compose exec backend php artisan key:generate
```

### 5. Ejecutar migraciones

```bash
docker-compose exec backend php artisan migrate
```

### 6. Instalar dependencias del frontend (Next.js)

Las dependencias se instalan automáticamente al levantar el contenedor gracias al comando configurado en `docker-compose.yml`. Si necesitas instalarlas manualmente:

```bash
docker-compose exec frontend pnpm install
```

## Ejecución Local

### Iniciar todos los servicios

```bash
docker-compose up -d
```

La aplicación estará disponible en:
- **Frontend**: http://localhost:3000
- **Backend API**: http://localhost/api
- **PostgreSQL**: localhost:5432

### Ver logs

```bash
# Logs de todos los servicios
docker-compose logs -f

# Logs de un servicio específico
docker-compose logs -f frontend
docker-compose logs -f backend
```

### Detener los servicios

```bash
docker-compose down
```

## Estructura del Proyecto

```
prueba_tecnica_vertilux/
├── backend/                    # API Laravel
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/    # AuthController, OrderController
│   │   │   ├── Requests/       # Form requests
│   │   │   └── Resources/      # API resources
│   │   ├── Models/             # User, Order, Payment, etc.
│   │   ├── Services/           # Lógica de negocio
│   │   └── Exceptions/         # Excepciones personalizadas
│   ├── database/
│   │   ├── migrations/
│   │   └── seeders/
│   ├── routes/
│   │   └── api.php
│   └── tests/
├── frontend/                   # App Next.js
│   ├── app/                    # App Router
│   │   ├── (auth)/             # Rutas de autenticación
│   │   │   └── login/
│   │   ├── (dashboard)/        # Rutas protegidas
│   │   │   ├── dashboard/
│   │   │   └── orders/
│   │   ├── layout.tsx
│   │   └── page.tsx
│   ├── components/
│   │   ├── dashboard/          # KPIs, filtros, paginación
│   │   ├── orders/             # Tabla de órdenes, badges
│   │   └── ui/                 # Componentes shadcn/ui
│   ├── hooks/                  # Custom hooks (use-orders, use-kpis)
│   ├── services/               # Servicios API
│   ├── lib/                    # Utilidades y configuración
│   └── types/                  # Tipos TypeScript
├── docker_configs/
│   ├── nginx/
│   └── php/
└── docker-compose.yml
```

## API Endpoints

### Autenticación

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| POST | `/api/auth/login` | Iniciar sesión |
| POST | `/api/auth/logout` | Cerrar sesión (requiere auth) |

### Órdenes (requiere autenticación)

| Método | Endpoint | Descripción |
|--------|----------|-------------|
| GET | `/api/orders` | Listar órdenes con filtros y paginación |
| GET | `/api/orders/{id}` | Detalle de una orden |
| GET | `/api/orders/kpis` | KPIs del dashboard |

## Decisiones Técnicas

### Separación Frontend/Backend

Se optó por una arquitectura completamente separada para permitir:
- Escalar frontend y backend de forma independiente
- Flexibilidad para cambiar de framework en el futuro
- Mejor organización del código en equipos grandes

### Next.js App Router

Se utilizó el App Router (Next.js 16) por:
- Soporte nativo para layouts anidados
- Route groups para organizar rutas `(auth)` y `(dashboard)`
- Mejor performance con Server Components cuando aplique

### TanStack Query

Se eligió React Query para:
- Caching automático de peticiones
- Manejo de estados de loading y error
- Invalidación y refetch simplificados
- Deduplicación de requests

### shadcn/ui

Componentes UI basados en Radix UI que ofrecen:
- Accesibilidad por defecto
- Personalización completa
- Sin dependencias externas en runtime

### Laravel Sanctum

Autenticación con tokens API simple y efectiva para SPAs.

## Tradeoffs Realizados

### Organización Estructurada

Se estructuró el proyecto de manera que cada carpeta está en su lugar correspondiente:
- **components/** - Componentes reutilizables (divididos por dominio y UI)
- **app/** - Páginas y layouts (usando route groups)
- **hooks/** - Lógica de estado reutilizable
- **services/** - Llamadas a la API
- **lib/** - Utilidades y configuración

Esto mejora la mantenibilidad pero requiere disciplina para mantener la consistencia.

### Sin Server Components

Aunque Next.js 16 soporta Server Components, se utilizó principalmente client components para simplificar el manejo de estado con React Query y mantener la lógica de autenticación en el cliente.

### Docker en Desarrollo

El uso de Docker simplifica la configuración del entorno pero puede tener un ligero overhead de rendimiento comparado con una instalación nativa.

## Mejoras Futuras

### Frontend

- [ ] **Middleware de autenticación** - Proteger rutas en el servidor antes de renderizar
- [ ] **Sistema de notificaciones/toasts** - Mostrar mensajes de error y éxito al usuario
- [ ] **Manejo de errores global** - Implementar Error Boundaries
- [ ] **Loading states por componente** - Esqueletos específicos en lugar de loading.tsx global
- [ ] **Tests de componentes** - Agregar Jest + React Testing Library
- [ ] **Optimistic updates** - Mejorar UX en operaciones de actualización
- [ ] **Internacionalización (i18n)** - Soporte multiidioma
- [ ] **PWA** - Convertir en Progressive Web App

### Backend

- [ ] **Rate limiting** - Limitar peticiones por usuario/IP
- [ ] **Colas** - Procesamiento asíncrono con Redis
- [ ] **Logs estructurados** - Integrar con servicios de monitoreo
- [ ] **Tests de integración** - Cobertura de endpoints API
- [ ] **Documentación OpenAPI/Swagger** - Documentar la API automáticamente
- [ ] **Caching** - Implementar cache en endpoints frecuentes

### Infraestructura

- [ ] **CI/CD Pipeline** - GitHub Actions para tests automáticos
- [ ] **Ambiente de staging** - Separar ambientes de desarrollo y producción
- [ ] **Monitoreo** - Health checks y alertas
- [ ] **CDN para assets** - Optimizar carga de recursos estáticos

## Variables de Entorno

N/A - El proyecto utiliza los archivos `.env` estándar de cada framework. Las variables necesarias ya están configuradas en el `docker-compose.yml` para desarrollo local.

### Backend (.env)
```env
DB_CONNECTION=pgsql
DB_HOST=postgres
DB_PORT=5432
DB_DATABASE=challenge
DB_USERNAME=challenge
DB_PASSWORD=challenge
```

### Frontend
Las variables de entorno del frontend se configuran automáticamente para conectar con el backend a través de Nginx.

## Licencia

MIT License
