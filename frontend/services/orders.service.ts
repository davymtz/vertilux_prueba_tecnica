import { api } from '@/lib/api'
import { KpisResponse, OrdersParams, OrdersResponse } from '@/types/index'

export const ordersService = {
  kpis(params: OrdersParams) {
    const clean = Object.fromEntries(
      Object.entries(params).filter(
        ([, v]) => v !== undefined && v !== null && v !== ''
      )
    )
    return api.get<KpisResponse>(
      '/orders/kpis',
     clean
    )
  },
  list(params: OrdersParams) {
    // Filtra keys con valores undefined, null o string vacío
    const clean = Object.fromEntries(
      Object.entries(params).filter(
        ([, v]) => v !== undefined && v !== null && v !== ''
      )
    )
    return api.get<OrdersResponse>(
      '/orders',
     clean
    )
  },
}