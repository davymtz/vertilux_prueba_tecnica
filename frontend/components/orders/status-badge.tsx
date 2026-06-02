import { Badge } from '@/components/ui/badge'

interface Props {
  status: string
}

export function StatusBadge({
  status,
}: Props) {
  const variants = {
    paid:
      'bg-green-100 text-green-700 hover:bg-green-100',

    pending:
      'bg-yellow-100 text-yellow-700 hover:bg-yellow-100',

    failed:
      'bg-red-100 text-red-700 hover:bg-red-100',

    refunded:
      'bg-violet-100 text-violet-700 hover:bg-violet-100',
  }

  return (
    <Badge
      variant="secondary"
      className={
        variants[
          status as keyof typeof variants
        ]
      }
    >
      {status}
    </Badge>
  )
}
