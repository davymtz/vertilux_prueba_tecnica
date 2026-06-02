// 'use client'

// import { useState } from 'react'

// import { useOrders } from '@/hooks/use-orders'

// import { OrdersTable } from '@/components/orders/orders-table'

// export default function OrdersPage() {
//   const [page, setPage] =
//     useState(1)

//   const {
//     data,
//     isLoading,
//   } = useOrders(page)

//   if (isLoading) {
//     return (
//       <div>
//         Cargando...
//       </div>
//     )
//   }

//   return (
//     <div className="space-y-6">
//       <div>
//         <h1 className="text-3xl font-bold">
//           Órdenes
//         </h1>

//         <p className="text-muted-foreground">
//           Administración de órdenes.
//         </p>
//       </div>

//       <OrdersTable
//         orders={data?.data ?? []}
//         page={page}
//         lastPage={
//           data?.last_page ?? 1
//         }
//         onPageChange={setPage}
//       />
//     </div>
//   )
// }