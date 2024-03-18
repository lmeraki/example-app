<template>

    <Head title="File 201" />

    <a-space style="width: 100%;" direction="vertical" size="middle">
        <a-card size="small" :bordered="false">

            <template #title>
                <a-button @click="$inertia.get(route(`file201.create`))">
                    <template #icon>
                        <plus-outlined />
                    </template> Create File
                </a-button>
            </template>

            <a-table size="small" bordered row-key="id" :columns="columns" :data-source="files" :pagination="false">

                <template #bodyCell="{ column, record }">
                    <a-space v-if="column.key === 'action'">
                        <a-button title="Edit Record" @click="$inertia.get(route(`file201.edit`, record.id))">
                            <template #icon>
                                <edit-two-tone />
                            </template>
                        </a-button>

                        <a-button title="Delete Record" @click="$inertia.delete(route(`file201.delete`, record.id))"
                            type="primary" danger>
                            <template #icon>
                                <delete-outlined />
                            </template>
                        </a-button>
                    </a-space>
                </template>
            </a-table>
        </a-card>
    </a-space>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'

export default {
    layout: AppLayout,
    props: {
        files: Array,
    },
    computed: {
        columns: () => [
            {
                title: 'Last Name',
                dataIndex: 'last_name',
                key: 'last_name',
                ellipsis: true,
            },
            {
                title: 'First Name',
                dataIndex: 'first_name',
                key: 'first_name',
            },
            {
                title: 'Middle Name',
                dataIndex: 'middle_name',
                key: 'middle_name',
            },
            {
                title: 'Extension Name',
                dataIndex: 'extension_name',
                key: 'extension_name',
            },
            {
                title: 'Date of Birth',
                dataIndex: 'date_of_birth',
                key: 'date_of_birth',
            },
            {
                title: 'Civil Status',
                dataIndex: 'civil_status',
                key: 'civil_status',
            },
            {
                title: 'Address',
                dataIndex: 'address',
                key: 'address',
            },
            {
                title: 'Contact Details',
                dataIndex: 'contact_details',
                key: 'contact_details',
            },
            {
                title: 'Action',
                key: 'action',
                align: 'center',
                width: '10%'
            }
        ],
    },
}
</script>