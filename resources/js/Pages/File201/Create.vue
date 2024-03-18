<template>

    <Head title="Create Record" />

    <a-space style="width: 100%;" direction="vertical" size="middle">
        <a-card size="small" :bordered="false">
            <template #title>
                <a-typography-title :level="4">Create Form</a-typography-title>
            </template>
            <template #extra>
                <a-button title="Restore Record" @click="$inertia.get(route(`file201.index`))">
                    <template #icon>
                        <arrow-left-outlined />
                    </template> Return to File Lists
                </a-button>
            </template>

            <a-form layout="vertical" :model="form" autocomplete="off" @finish="store">
                <a-row :gutter="24">
                    <a-col :span="8">
                        <a-form-item label="Last Name" name="last_name" :help="form.errors.last_name"
                            :validateStatus="form.errors.last_name ? 'error' : ''" has-feedback>
                            <a-input v-model:value="form.last_name" placeholder="Enter last name"
                                @change="delete form.errors.last_name" />
                        </a-form-item>
                    </a-col>
                    <a-col :span="8">
                        <a-form-item label="First Name" name="first_name" :help="form.errors.first_name"
                            :validateStatus="form.errors.first_name ? 'error' : ''" has-feedback>
                            <a-input v-model:value="form.first_name" placeholder="Enter first name"
                                @change="delete form.errors.first_name" />
                        </a-form-item>
                    </a-col>
                    <a-col :span="8">
                        <a-form-item label="Middle Name" name="middle_name" :help="form.errors.middle_name"
                            :validateStatus="form.errors.middle_name ? 'error' : ''" has-feedback>
                            <a-input v-model:value="form.middle_name" placeholder="Enter middle name"
                                @change="delete form.errors.middle_name" />
                        </a-form-item>
                    </a-col>
                </a-row>
                <a-row :gutter="24">
                    <a-col :span="8">
                        <a-form-item label="Extension Name" name="extension_name" :help="form.errors.extension_name"
                            :validateStatus="form.errors.extension_name ? 'error' : ''" has-feedback>
                            <a-input v-model:value="form.extension_name" placeholder="Enter extension name"
                                @change="delete form.errors.extension_name" />
                        </a-form-item>
                    </a-col>
                    <a-col :span="8">
                        <a-form-item label="Date of Birth" name="date_of_birth" :help="form.errors.date_of_birth"
                            :validateStatus="form.errors.date_of_birth ? 'error' : ''" has-feedback>
                            <a-date-picker style="width: 100%;" v-model:value="form.date_of_birth" />
                        </a-form-item>
                    </a-col>
                    <a-col :span="8">
                        <a-form-item label="Civil Status" name="civil_status" :help="form.errors.civil_status"
                            :validateStatus="form.errors.civil_status ? 'error' : ''" has-feedback>
                            <a-select ref="select" v-model:value="form.civil_status" style="width: 100%"
                                :options="civilOptions">
                            </a-select>
                        </a-form-item>
                    </a-col>
                </a-row>

                <a-row :gutter="24">
                    <a-col :span="8">
                        <a-form-item label="Address" name="address" :help="form.errors.address"
                            :validateStatus="form.errors.address ? 'error' : ''" has-feedback>
                            <a-textarea v-model:value="form.address" placeholder="Enter address" :rows="2"
                                @change="delete form.errors.address" />
                        </a-form-item>
                    </a-col>
                    <a-col :span="8">
                        <a-form-item label="Contact Details" name="contact_details" :help="form.errors.contact_details"
                            :validateStatus="form.errors.contact_details ? 'error' : ''" has-feedback>
                            <a-input v-model:value="form.contact_details" placeholder="Enter contact details"
                                @change="delete form.errors.contact_details" />
                        </a-form-item>
                    </a-col>
                </a-row>

                <a-row justify="end">
                    <a-space>
                        <a-button html-type="submit" :loading="form.loading">
                            <template #icon>
                                <check-outlined />
                            </template>
                            {{ form.loading ? `Processing form...` : `Create Record` }}
                        </a-button>
                    </a-space>
                </a-row>
            </a-form>
        </a-card>
    </a-space>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout.vue'
import dayjs from 'dayjs'

export default {
    layout: AppLayout,
    data() {
        return {
            form: this.$inertia.form({
                first_name: '',
                last_name: '',
                middle_name: '',
                has_middle_name: '',
                extension_name: '',
                date_of_birth: dayjs(),
                civil_status: 'Single',
                address: '',
                contact_details: '',
            })
        }
    },
    computed: {
        civilOptions() {
            return [
                {
                    value: 'Single',
                    label: 'Single'
                },
                {
                    value: 'Married',
                    label: 'Married'
                },
            ]
        }
    },
    methods: {
        store() {
            this.form.transform((data) => ({
                ...data,
                date_of_birth: data.date_of_birth.format('YYYY-MM-DD'),
            })).post(route(`file201.store`))
        }
    }
}
</script>

<style>
.btn-e {
    padding: 1;
}
</style>