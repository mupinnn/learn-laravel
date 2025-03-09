import AppLayout from '@/admin/layouts/app-layout';
import { type BreadcrumbItem } from '@/admin/types';
import { Head } from '@inertiajs/react';

type Product = {
    id: number;
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Dashboard',
        href: route('admin.dashboard'),
    },
    {
        title: 'Products',
        href: route('admin.products.index'),
    },
];

export default function ProductsIndex({ products }: { products: Product[] }) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Products" />
        </AppLayout>
    );
}
