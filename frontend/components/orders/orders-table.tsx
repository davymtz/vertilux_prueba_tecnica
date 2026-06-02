'use client'

import {
  Table,
  TableBody,
  TableCell,
  TableHead,
  TableHeader,
  TableRow,
} from '@/components/ui/table'

import {
  Card,
  CardContent,
} from '@/components/ui/card'

import { StatusBadge } from './status-badge'
import { PaymentMethodBadge } from './payment-method-badge'
import { OrderListingResource } from '@/types/index'
import { ScrollArea } from '../ui/scroll-area'

interface Props {
  orders: OrderListingResource[]
}

export function OrdersTable({
  orders,
}: Props) {
  return (
    <Card>
      <CardContent className="p-0">
        <ScrollArea className="h-[300px] w-full rounded-md border">
          <div>
            <Table>
              <TableHeader>
                <TableRow>
                  <TableHead>REFERENCE</TableHead>
                  <TableHead>CLIENTE</TableHead>
                  <TableHead>EMAIL</TableHead>
                  <TableHead>MONTO</TableHead>
                  <TableHead>DIVISA</TableHead>
                  <TableHead>STATUS</TableHead>
                  <TableHead>MÉTODO</TableHead>
                  <TableHead>CANAL</TableHead>
                  <TableHead>FECHA</TableHead>
                </TableRow>
              </TableHeader>

              <TableBody>
                {orders.map(order => (
                  <TableRow key={order.id}>
                    <TableCell>
                      {order.reference}
                    </TableCell>

                    <TableCell className="font-medium">
                      {order.full_name}
                    </TableCell>

                    <TableCell>
                      {order.email}
                    </TableCell>

                    <TableCell>
                      {new Intl.NumberFormat(
                        'es-MX',
                        {
                          style: 'currency',
                          currency:
                            order.currency,
                        }
                      ).format(order.amount)}
                    </TableCell>

                    <TableCell>
                      {order.currency}
                    </TableCell>

                    <TableCell>
                      <StatusBadge status={order.status_order} />
                    </TableCell>

                    <TableCell>
                      <PaymentMethodBadge method={order.method} />
                    </TableCell>

                    <TableCell>
                      {order.channel}
                    </TableCell>
                    
                    <TableCell>
                      {order.date_order}
                    </TableCell>
                  </TableRow>
                ))}
              </TableBody>
            </Table>
          </div>
        </ScrollArea>
      </CardContent>
    </Card>
  )
}