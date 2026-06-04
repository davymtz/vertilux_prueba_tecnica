'use client'

import { useOrders } from '@/hooks/use-orders'
import { KpiCards } from '@/components/dashboard/kpi-cards'
import { OrdersTable } from '@/components/orders/orders-table'
import { useState } from 'react'
import { useDebounce } from 'use-debounce'
import { OrdersFilters } from '@/components/dashboard/orders-filters'
import { Pagination } from '@/components/dashboard/pagination'
import { useKpis } from '@/hooks/use-kpis'

export default function DashboardPage() {
  const [page, setPage] = useState(1)
  const [limit, setLimit] = useState(10)
  const [search, setSearch] = useState('')
  const [status, setStatus] = useState('')
  const [sort_by] = useState('created_at')
  const [sort_direction] = useState<'asc' | 'desc'>('desc')
  const [debouncedSearch] = useDebounce(search, 500)

  const { data: ordersData } = useOrders({
    page,
    limit,
    search: debouncedSearch,
    status,
    sort_by,
    sort_direction,
  })

  const { data: kpisData } = useKpis({
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
        paidOrders={kpisData?.data?.paidOrders}
        pendingOrders={kpisData?.data?.pendingOrders}
        refundedOrders={kpisData?.data?.refundedOrders}
        // revenue={kpisData?.data?.revenue}
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
        />
        <div className="mt-4">
          <OrdersTable
            orders={ordersData?.data?.items ?? []}
          />
        </div>
        <div className="mt-4">
          <Pagination
            page={page}
            limit={limit}
            lastPage={ordersData?.data?.lastPage}
            onPageChange={setPage}
            onLimitChange={setLimit}
          />
        </div>
      </div>
    </div>
  )
}
