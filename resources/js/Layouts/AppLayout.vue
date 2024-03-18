<!-- @format -->

<template>
	<a-layout class="layout">
		<a-config-provider :theme="{
			token: {
				colorPrimary: '#4040c8',
				colorLink: '#4040c8',
				borderRadius: 5,
				fontFamily: `'Fira Sans', Ubuntu, 'Proza Libre', -apple-system, BlinkMacSystemFont, 'Segoe UI' , Roboto, 'Helvetica Neue' , Arial, 'Noto Sans' , sans-serif, 'Apple Color Emoji' , 'Segoe UI Emoji' , 'Segoe UI Symbol' , 'Noto Color Emoji'`
			}
		}">

			<a-layout-content style="padding: 0 10px">
				<div style="margin-top: 16px;">
					<a-alert v-if="$page.props.flash.success && show" message="Success"
						:description="$page.props.flash.success" type="success" show-icon closable />

					<a-alert v-if="$page.props.flash.info && show" message="Information"
						:description="$page.props.flash.info" type="info" show-icon closable />

					<div v-if="($page.props.flash.error || Object.keys($page.props.errors).length > 0) && show">
						<a-alert v-if="$page.props.flash.error" message="Error" :description="$page.props.flash.error"
							type="error" show-icon closable />
						<a-alert v-else message="Error" type="error" show-icon closable>
							<template #description>
								<span v-if="Object.keys($page.props.errors).length === 1">There is one form
									error.</span>
								<span v-else>There are {{ Object.keys($page.props.errors).length }} form errors.</span>
							</template>
						</a-alert>
					</div>
				</div>

				<div :style="{
			background: '#fff',
			padding: '24px',
			minHeight: '100%',
			margin: '16px 0'
		}">
					<a-divider />
					<a-space style="width: 100%" direction="vertical">
						<slot />
					</a-space>
				</div>
			</a-layout-content>
		</a-config-provider>
	</a-layout>
</template>

<script>

export default {
	data: () => ({ show: true }),
	watch: {
		'flash': {
			deep: true,
			handler() {
				this.show = true
			}
		}
	}
}

</script>

<style>
.main-content {
	background: '#fff';
	padding: '24px';
	min-height: '470px';
}

.site-layout-content {
	min-height: 280px;
	padding: 24px;
	background: #fff;
}

.logo {
	float: left;
	width: 120px;
	height: 31px;
	margin: 16px 24px 16px 0;
	background: rgba(255, 255, 255, 0.3);
}

.ant-row-rtl .logo {
	float: right;
	margin: 16px 0 16px 24px;
}
</style>
