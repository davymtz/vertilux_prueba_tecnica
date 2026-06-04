import {
  Card,
  CardContent,
  CardHeader,
  CardTitle,
} from '@/components/ui/card'

interface Props {
  totalOrders?: number
  paidOrders?: number
  pendingOrders?: number
  refundedOrders?: number
  // revenue?: number
}

export function KpiCards({
  totalOrders = 0,
  paidOrders = 0,
  pendingOrders = 0,
  refundedOrders = 0,
  // revenue = 0
}: Props) {
  return (
    <div className="grid gap-4 md:grid-cols-2 xl:grid-cols-4">

      <Card>
        <CardHeader>
          <CardTitle>Total órdenes</CardTitle>
        </CardHeader>

        <CardContent>
          <p className="text-3xl font-bold">
            {totalOrders}
          </p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Pagadas</CardTitle>
        </CardHeader>

        <CardContent>
          <p className="text-3xl font-bold">
            {paidOrders}
          </p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Pendientes</CardTitle>
        </CardHeader>

        <CardContent>
          <p className="text-3xl font-bold">
            {pendingOrders}
          </p>
        </CardContent>
      </Card>

      <Card>
        <CardHeader>
          <CardTitle>Refunded</CardTitle>
        </CardHeader>

        <CardContent>
          <p className="text-3xl font-bold">
            {refundedOrders}
          </p>
        </CardContent>
      </Card>
      
      {/* <Card>
        <CardHeader>
          <CardTitle>Revenue</CardTitle>
        </CardHeader>

        <CardContent>
          <p className="text-3xl font-bold">
            {revenue}
          </p>
        </CardContent>
      </Card> */}
    </div>
  )
}