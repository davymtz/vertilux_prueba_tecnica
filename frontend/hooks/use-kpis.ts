import { useQuery } from '@tanstack/react-query'
import { ordersService } from '@/services/orders.service'
import { OrdersParams } from '@/types'

export function useKpis(
  params: OrdersParams,
) {
  return useQuery({
    queryKey: ['kpis', params],

    queryFn: () => ordersService.kpis(params),

    placeholderData: previous => previous,

    staleTime: 1000 * 60,
  })
}