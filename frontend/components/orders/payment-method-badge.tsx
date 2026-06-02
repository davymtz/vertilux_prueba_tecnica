import { Badge } from '@/components/ui/badge'

interface Props {
  method: string
}

export function PaymentMethodBadge({
  method,
}: Props) {
  return (
    <Badge variant="outline">
      {method}
    </Badge>
  )
}
