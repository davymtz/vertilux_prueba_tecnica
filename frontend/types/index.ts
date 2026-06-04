export interface User {
  name: string
  email: string
}

export interface AuthResponse {
  user: User
  token: string
  tokenExpiration: string | null
}

export interface Order {
  id: number
  user_id: number
  reference: string
  amount: number
  currency: string
  status: 'paid' | 'pending' | 'failed' | 'refunded'
  channel: 'web' | 'app' | 'api'
  metadata: OrderMetadata
  created_at: string
  updated_at: string
  user: OrderUser
  payments?: Payment[]
  status_logs?: StatusLog[]
}

export interface OrderListingResource {
  id: number
  reference: string
  full_name: string
  email: string
  amount: number
  currency: string
  status_order: 'paid' | 'pending' | 'failed' | 'refunded'
  method: string
  channel: 'web' | 'app' | 'api'
  date_order: string
}

export interface OrderUser {
  id: number
  name: string
  last_name: string
  email: string
  phone: string
  country: string
}

export interface OrderMetadata {
  ip: string
  user_agent: string
  description: string
  items: OrderItem[]
  failure_reason?: string
  refund_reason?: string
  crypto_tx?: string
}

export interface OrderItem {
  sku: string
  qty: number
  price: number
}

export interface Payment {
  id: number
  order_id: number
  gateway_id: string
  method: 'card' | 'transfer' | 'cash' | 'crypto'
  status: string
  amount: number
  currency: string
  gateway_response: Record<string, unknown>
  processed_at: string | null
  created_at: string
  updated_at: string
}

export interface StatusLog {
  id: number
  order_id: number
  from_status: string | null
  to_status: string
  reason: string
  changed_by: number | null
  created_at: string
}

export interface OrdersResponse {
  data: {
    items: OrderListingResource[]
    total: number
    perPage: number
    currentPage: number
    lastPage: number
  }
}

export interface KpisResponse {
  data: {
    totalOrders: number
    paidOrders: number
    pendingOrders: number
    refundedOrders: number
    // revenue: number
  }
}

export interface OrdersParams {
  page: number
  limit: number
  search?: string
  status?: string
  sort_by?: string
  sort_direction?: string
}