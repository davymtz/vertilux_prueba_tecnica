import { Input } from '@/components/ui/input'

import {
  Select,
  SelectContent,
  SelectItem,
  SelectTrigger,
  SelectValue,
} from '@/components/ui/select'

interface Props {
  search: string
  status: string

  onSearchChange: (
    value: string
  ) => void

  onStatusChange: (
    value: string
  ) => void
}

export function OrdersFilters({
  search,
  status,
  onSearchChange,
  onStatusChange,
}: Props) {
  return (
    <div className="flex gap-4">

      <Input
        placeholder="Buscar..."
        value={search}
        onChange={e =>
          onSearchChange(
            e.target.value
          )
        }
      />

      <Select
        defaultValue="all"
        value={status}
        onValueChange={(value) => {
          onStatusChange(String(value))
        }}
      >
        <SelectTrigger className="w-48">
          <SelectValue placeholder="Status" />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value="all">
            Todos
          </SelectItem>
          <SelectItem value="paid">
            Paid
          </SelectItem>
          <SelectItem value="pending">
            Pending
          </SelectItem>
          <SelectItem value="failed">
            Failed
          </SelectItem>
          <SelectItem value="refunded">
            Refunded
          </SelectItem>
        </SelectContent>
      </Select>

    </div>
  )
}