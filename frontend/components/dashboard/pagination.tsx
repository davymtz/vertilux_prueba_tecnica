import { Button } from '@/components/ui/button'
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '../ui/select'

interface Props {
  page: number
  limit: number
  lastPage?: number
  onPageChange: (page: number) => void
  onLimitChange: (limit: number) => void
}

export function Pagination({
  page,
  limit,
  lastPage = 1,
  onPageChange,
  onLimitChange,
}: Props) {
  return (
    <div className="flex justify-end gap-2">

      <Button
        variant="outline"
        disabled={page === 1}
        onClick={() =>
          onPageChange(page - 1)
        }
      >Anterior</Button>

      <span className="flex items-center px-4">
        Página {page} de {lastPage}
      </span>

      <Button
        variant="outline"
        disabled={
          page === lastPage
        }
        onClick={() =>
          onPageChange(page + 1)
        }
      >Siguiente</Button>

      <Select
        value={limit}
        onValueChange={(value) => {
          onLimitChange(Number(value))
          onPageChange(1)
        }}
      >
        <SelectTrigger className="w-32">
          <SelectValue />
        </SelectTrigger>
        <SelectContent>
          <SelectItem value="5">5</SelectItem>
          <SelectItem value="10">10</SelectItem>
          <SelectItem value="15">15</SelectItem>
        </SelectContent>
      </Select>
    </div>
  )
}