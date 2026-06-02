import type { Metadata } from 'next'
import { Inter, Geist } from 'next/font/google'
import './globals.css'
import Providers from '@/components/providers'
import { cn } from "@/lib/utils";
import { ThemeProvider } from '@/components/ThemeProvider';

const geist = Geist({subsets:['latin'],variable:'--font-sans'});

const inter = Inter({ subsets: ['latin'] })

export const metadata: Metadata = {
  title: 'FinPanel — Portal de órdenes',
  description: 'Portal administrativo de órdenes y pagos',
}

export default function RootLayout({ children, }: { children: React.ReactNode }) {
  return (
    <html lang="es" className={cn("font-sans", geist.variable)} suppressHydrationWarning>
      <body className={inter.className}>
        <ThemeProvider>
          <Providers>
            {children}
          </Providers>
        </ThemeProvider>
      </body>
    </html>
  )
}