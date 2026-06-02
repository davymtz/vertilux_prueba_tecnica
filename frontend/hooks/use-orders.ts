import { useQuery } from '@tanstack/react-query'
import { ordersService } from '@/services/orders.service'
import { OrdersParams } from '@/types'

export function useOrders(
  params: OrdersParams,
) {
  return useQuery({
    queryKey: ['orders', params],

    queryFn: () => ordersService.list(params),

    placeholderData: previous => previous,

    staleTime: 1000 * 60,
  })
}