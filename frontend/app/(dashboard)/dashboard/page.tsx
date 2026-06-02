'use client'

import { useOrders } from '@/hooks/use-orders'
import { KpiCards } from '@/components/dashboard/kpi-cards'
import { OrdersTable } from '@/components/orders/orders-table'
import { useState } from 'react'
import { useDebounce } from 'use-debounce'
import { OrdersFilters } from '@/components/dashboard/orders-filters'
import { Pagination } from '@/components/dashboard/pagination'
import { Separator } from '@/components/ui/separator'
import { useKpis } from '@/hooks/use-kpis'

export default function DashboardPage() {
  const [page, setPage] = useState(1)
  const [limit, setLimit] = useState(10)
  const [search, setSearch] = useState('')
  const [status, setStatus] = useState('')
  const [sort_by, setSortBy] = useState('created_at')
  const [sort_direction, setSortDirection] = useState<'asc' | 'desc'>('desc')
  const [debouncedSearch] = useDebounce(search, 500)

  const { data:ordersData } = useOrders({
    page,
    limit,
    search: debouncedSearch,
    status,
    sort_by,
    sort_direction,
  })
  
  const { data:kpisData } = useKpis({
    page,
    limit,
    search: debouncedSearch,
    status,
    sort_by,
    sort_direction,
  })

  return (
    <div className="space-y-6">
      <div>
        <h1 className="text-3xl font-bold">
          Dashboard
        </h1>
        <p className="text-muted-foreground">
          Resumen general del sistema.
        </p>
      </div>
      <KpiCards
        totalOrders={kpisData?.data?.totalOrders}
        paidOrders={kpisData?.data?.pendingOrders}
        pendingOrders={kpisData?.data?.pendingOrders}
        refundedOrders={kpisData?.data?.refundedOrders}
      />
      <div>
        <h2 className="text-xl font-semibold mb-4">
          Últimas órdenes
        </h2>
        <OrdersFilters
          search={search}
          status={status}
          onSearchChange={setSearch}
          onStatusChange={setStatus}
        /> <br />
        <OrdersTable
          orders={ordersData?.data?.items ?? []}
        /> <br />
        <Pagination
          page={page}
          limit={limit}
          lastPage={ordersData?.data?.lastPage}
          onPageChange={setPage}
          onLimitChange={setLimit}
        />
      </div>
    </div>
  )
}