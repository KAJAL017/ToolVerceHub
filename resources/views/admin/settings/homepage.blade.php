@extends('admin.layouts.app')

@section('title', 'Homepage Settings')
@section('page-title', 'Homepage Settings')
@section('page-subtitle', 'Manage homepage stats section')

@section('content')

<form id="settingsForm" action="{{ route('admin.settings.homepage.update') }}" method="POST">
    @csrf
    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Main Settings -->
        <div class="lg:col-span-2 space-y-6">
            
            <!-- Hero Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-rocket text-primary-600 mr-2"></i>
                    Hero Section
                </h3>
                <p class="text-sm text-gray-600 mb-6">Configure the main hero banner content on the homepage.</p>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Badge Text <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="hero_badge_text" value="{{ $settings['hero_badge_text'] }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="e.g., The #1 Free Multi-Tool Platform">
                    <p class="text-xs text-gray-500 mt-1">Small badge text at the top of hero section</p>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_badge_text"></p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Title Line 1 <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="hero_title_line1" value="{{ $settings['hero_title_line1'] }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="e.g., All Your">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_title_line1"></p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Title Highlight 1 (Green) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="hero_title_highlight1" value="{{ $settings['hero_title_highlight1'] }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="e.g., Free Digital">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_title_highlight1"></p>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Title Line 2 <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="hero_title_line2" value="{{ $settings['hero_title_line2'] }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="e.g., Tools">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_title_line2"></p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Title Highlight 2 (Orange) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="hero_title_highlight2" value="{{ $settings['hero_title_highlight2'] }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="e.g., Under One Roof.">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_title_highlight2"></p>
                    </div>
                </div>
                
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Description <span class="text-red-500">*</span>
                    </label>
                    <textarea name="hero_description" rows="3" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                        placeholder="Main description text below the title">{{ $settings['hero_description'] }}</textarea>
                    <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_description"></p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Feature 1 (Green) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="hero_feature1_text" value="{{ $settings['hero_feature1_text'] }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="e.g., 130+ Free Tools">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_feature1_text"></p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Feature 2 (Orange) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="hero_feature2_text" value="{{ $settings['hero_feature2_text'] }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="e.g., 500+ HTML5 Games">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_feature2_text"></p>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                            Feature 3 (Blue) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="hero_feature3_text" value="{{ $settings['hero_feature3_text'] }}" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="e.g., No Signup Required">
                        <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="hero_feature3_text"></p>
                    </div>
                </div>
            </div>
            
            
            <!-- Hero Buttons Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 mb-6">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <i class="fas fa-mouse-pointer text-primary-600 mr-2"></i>
                            Hero Section Buttons
                        </h3>
                        <p class="text-sm text-gray-600 mt-1">Manage call-to-action buttons in hero section</p>
                    </div>
                    <button type="button" onclick="openAddButtonModal()" class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors text-sm flex items-center gap-2">
                        <i class="fas fa-plus"></i>
                        <span>Add Button</span>
                    </button>
                </div>
                
                @if($heroButtons && count($heroButtons) > 0)
                    <div class="space-y-3">
                        @foreach($heroButtons as $button)
                        <div class="border rounded-lg p-4 {{ $button->color == 'green' ? 'bg-green-50 border-green-200' : ($button->color == 'orange' ? 'bg-orange-50 border-orange-200' : 'bg-blue-50 border-blue-200') }}" data-button-id="{{ $button->id }}">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3 flex-1">
                                    <span class="text-2xl">{{ $button->icon }}</span>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-800 text-sm">{{ $button->text }}</h4>
                                        <p class="text-xs text-gray-600 mt-1">{{ $button->url }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-3">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" data-button-id="{{ $button->id }}" {{ $button->is_active ? 'checked' : '' }} onchange="toggleButton({{ $button->id }})" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-{{ $button->color }}-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-{{ $button->color }}-500"></div>
                                    </label>
                                    <button type="button" onclick="openEditButtonModal({{ $button->id }}, '{{ addslashes($button->icon) }}', '{{ addslashes($button->text) }}', '{{ addslashes($button->url) }}', '{{ $button->color }}')" class="text-blue-600 hover:text-blue-800 p-2 rounded hover:bg-blue-50">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" onclick="deleteButton({{ $button->id }})" class="text-red-600 hover:text-red-800 p-2 rounded hover:bg-red-50">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-gray-50 rounded-lg border-2 border-dashed border-gray-300">
                        <i class="fas fa-mouse-pointer text-5xl text-gray-300 mb-4"></i>
                        <p class="text-gray-500 font-medium">No buttons yet</p>
                        <p class="text-gray-400 text-sm mt-1">Click "Add Button" to create your first button</p>
                    </div>
                @endif
            </div>
            
            <!-- Stats Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-chart-bar text-primary-600 mr-2"></i>
                    Homepage Stats Section
                </h3>
                <p class="text-sm text-gray-600 mb-6">Configure the 4 stats that appear below the hero section on the homepage.</p>
                
                <!-- Stat 1 -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <span class="w-6 h-6 rounded-full bg-green-500 text-white text-xs flex items-center justify-center mr-2">1</span>
                        Stat 1
                    </h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat1_number" value="{{ $settings['stat1_number'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., 130+">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat1_number"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Label <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat1_label" value="{{ $settings['stat1_label'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., FREE TOOLS">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat1_label"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Color <span class="text-red-500">*</span>
                            </label>
                            <input type="color" name="stat1_color" value="{{ $settings['stat1_color'] }}" required
                                class="w-full h-10 px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat1_color"></p>
                        </div>
                    </div>
                </div>
                
                <!-- Stat 2 -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <span class="w-6 h-6 rounded-full bg-orange-500 text-white text-xs flex items-center justify-center mr-2">2</span>
                        Stat 2
                    </h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat2_number" value="{{ $settings['stat2_number'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., 500+">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat2_number"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Label <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat2_label" value="{{ $settings['stat2_label'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., HTML5 GAMES">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat2_label"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Color <span class="text-red-500">*</span>
                            </label>
                            <input type="color" name="stat2_color" value="{{ $settings['stat2_color'] }}" required
                                class="w-full h-10 px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat2_color"></p>
                        </div>
                    </div>
                </div>
                
                <!-- Stat 3 -->
                <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <span class="w-6 h-6 rounded-full bg-blue-500 text-white text-xs flex items-center justify-center mr-2">3</span>
                        Stat 3
                    </h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat3_number" value="{{ $settings['stat3_number'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., 100%">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat3_number"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Label <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat3_label" value="{{ $settings['stat3_label'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., FREE FOREVER">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat3_label"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Color <span class="text-red-500">*</span>
                            </label>
                            <input type="color" name="stat3_color" value="{{ $settings['stat3_color'] }}" required
                                class="w-full h-10 px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat3_color"></p>
                        </div>
                    </div>
                </div>
                
                <!-- Stat 4 -->
                <div class="mb-0 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <h4 class="text-sm font-bold text-gray-700 mb-3 flex items-center">
                        <span class="w-6 h-6 rounded-full bg-yellow-500 text-white text-xs flex items-center justify-center mr-2">4</span>
                        Stat 4
                    </h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Number <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat4_number" value="{{ $settings['stat4_number'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., 0">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat4_number"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Label <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="stat4_label" value="{{ $settings['stat4_label'] }}" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                                placeholder="e.g., SIGNUP NEEDED">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat4_label"></p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Color <span class="text-red-500">*</span>
                            </label>
                            <input type="color" name="stat4_color" value="{{ $settings['stat4_color'] }}" required
                                class="w-full h-10 px-2 py-1 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <p class="text-xs text-red-600 mt-1 hidden error-message" data-field="stat4_color"></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        
        <!-- Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6 sticky top-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <i class="fas fa-save text-primary-600 mr-2"></i>
                    Save Changes
                </h3>
                
                <button type="submit" class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors mb-3">
                    <i class="fas fa-save mr-2"></i>Save Homepage Settings
                </button>
                
                <button type="button" onclick="window.location.reload()" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-undo mr-2"></i>Reset Changes
                </button>
                
                <div class="mt-6 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-start space-x-2">
                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                        <div class="text-sm text-blue-700">
                            <p class="font-semibold mb-1">Quick Tips:</p>
                            <ul class="list-disc list-inside space-y-1 text-xs">
                                <li>Use short numbers like "130+" or "100%"</li>
                                <li>Labels should be uppercase for consistency</li>
                                <li>Choose colors that match your brand</li>
                                <li>Changes appear immediately on homepage</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</form>

@endsection

@section('scripts')
<!-- Add/Edit Button Modal -->
<div id="buttonModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50" style="display: none;">
    <div class="bg-white rounded-xl shadow-2xl max-w-md w-full mx-4">
        <div class="p-6 border-b border-gray-200">
            <h3 id="modalTitle" class="text-xl font-bold text-gray-800">Add Hero Button</h3>
        </div>
        <form id="buttonForm" class="p-6 space-y-4">
            <input type="hidden" id="buttonId" value="">
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Icon (Emoji) <span class="text-red-500">*</span></label>
                <select id="buttonIcon" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                    <option value="">Select an icon...</option>
                    @foreach($icons as $icon)
                        <option value="{{ $icon->icon }}">{{ $icon->icon }} {{ $icon->name }} ({{ $icon->category }})</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Button Text <span class="text-red-500">*</span></label>
                <input type="text" id="buttonText" required maxlength="100" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="e.g., Image Tools">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Button URL <span class="text-red-500">*</span></label>
                <input type="url" id="buttonUrl" required maxlength="500" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500" placeholder="https://example.com">
            </div>
            
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Button Color <span class="text-red-500">*</span></label>
                <div class="grid grid-cols-3 gap-3">
                    <label class="cursor-pointer">
                        <input type="radio" name="buttonColor" value="green" required class="sr-only peer">
                        <div class="p-4 border-2 border-gray-300 rounded-lg text-center peer-checked:border-green-500 peer-checked:bg-green-50 hover:border-green-300 transition-all">
                            <div class="w-8 h-8 bg-green-500 rounded-full mx-auto mb-2"></div>
                            <span class="text-sm font-semibold text-gray-700">Green</span>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="buttonColor" value="orange" required class="sr-only peer">
                        <div class="p-4 border-2 border-gray-300 rounded-lg text-center peer-checked:border-orange-500 peer-checked:bg-orange-50 hover:border-orange-300 transition-all">
                            <div class="w-8 h-8 bg-orange-500 rounded-full mx-auto mb-2"></div>
                            <span class="text-sm font-semibold text-gray-700">Orange</span>
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="buttonColor" value="blue" required class="sr-only peer">
                        <div class="p-4 border-2 border-gray-300 rounded-lg text-center peer-checked:border-blue-500 peer-checked:bg-blue-50 hover:border-blue-300 transition-all">
                            <div class="w-8 h-8 bg-blue-500 rounded-full mx-auto mb-2"></div>
                            <span class="text-sm font-semibold text-gray-700">Blue</span>
                        </div>
                    </label>
                </div>
            </div>
            
            <div class="flex gap-3 pt-4">
                <button type="submit" class="flex-1 bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-save mr-2"></i><span id="submitBtnText">Add Button</span>
                </button>
                <button type="button" onclick="closeButtonModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-3 px-4 rounded-lg transition-colors">
                    <i class="fas fa-times mr-2"></i>Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<script>
// Modal Functions
function openAddButtonModal() {
    document.getElementById('modalTitle').textContent = 'Add Hero Button';
    document.getElementById('submitBtnText').textContent = 'Add Button';
    document.getElementById('buttonId').value = '';
    document.getElementById('buttonForm').reset();
    document.getElementById('buttonModal').style.display = 'flex';
    
    // Initialize custom select for modal
    const modalIconSelect = document.getElementById('buttonIcon');
    if (modalIconSelect && typeof window.initCustomSelect === 'function') {
        window.initCustomSelect(modalIconSelect);
    }
}

function openEditButtonModal(id, icon, text, url, color) {
    document.getElementById('modalTitle').textContent = 'Edit Hero Button';
    document.getElementById('submitBtnText').textContent = 'Update Button';
    document.getElementById('buttonId').value = id;
    document.getElementById('buttonIcon').value = icon;
    document.getElementById('buttonText').value = text;
    document.getElementById('buttonUrl').value = url;
    document.querySelector(`input[name="buttonColor"][value="${color}"]`).checked = true;
    document.getElementById('buttonModal').style.display = 'flex';
    
    // Initialize custom select for modal
    const modalIconSelect = document.getElementById('buttonIcon');
    if (modalIconSelect && typeof window.initCustomSelect === 'function') {
        window.initCustomSelect(modalIconSelect);
    }
}

function closeButtonModal() {
    document.getElementById('buttonModal').style.display = 'none';
    document.getElementById('buttonForm').reset();
}

// Form Submit Handler
document.getElementById('buttonForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    const buttonId = document.getElementById('buttonId').value;
    const isEdit = buttonId !== '';
    
    const data = {
        icon: document.getElementById('buttonIcon').value,
        text: document.getElementById('buttonText').value,
        url: document.getElementById('buttonUrl').value,
        color: document.querySelector('input[name="buttonColor"]:checked').value,
    };
    
    const url = isEdit 
        ? `/admin/settings/hero-buttons/${buttonId}`
        : `{{ route('admin.settings.hero-buttons.store') }}`;
    
    const method = isEdit ? 'PUT' : 'POST';
    
    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            closeButtonModal();
            setTimeout(() => window.location.reload(), 1000);
        } else {
            showToast(data.message || 'An error occurred', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('An error occurred while saving the button', 'error');
    });
});

// Toggle Button Active Status
function toggleButton(id) {
    fetch(`/admin/settings/hero-buttons/${id}/toggle`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
        } else {
            showToast(data.message || 'An error occurred', 'error');
            // Revert checkbox state
            const checkbox = document.querySelector(`input[data-button-id="${id}"]`);
            if (checkbox) checkbox.checked = !checkbox.checked;
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('An error occurred while toggling the button', 'error');
        // Revert checkbox state
        const checkbox = document.querySelector(`input[data-button-id="${id}"]`);
        if (checkbox) checkbox.checked = !checkbox.checked;
    });
}

// Delete Button
function deleteButton(id) {
    if (!confirm('Are you sure you want to delete this button? This action cannot be undone.')) {
        return;
    }
    
    fetch(`/admin/settings/hero-buttons/${id}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            // Remove the button card from DOM
            const buttonCard = document.querySelector(`[data-button-id="${id}"]`);
            if (buttonCard) {
                buttonCard.style.opacity = '0';
                buttonCard.style.transform = 'scale(0.95)';
                buttonCard.style.transition = 'all 0.3s';
                setTimeout(() => buttonCard.remove(), 300);
            }
        } else {
            showToast(data.message || 'An error occurred', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('An error occurred while deleting the button', 'error');
    });
}

// Close modal when clicking outside
document.getElementById('buttonModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeButtonModal();
    }
});

// Initialize searchable select boxes for icon selection
document.addEventListener('DOMContentLoaded', function() {
    // No need to initialize icon selects here anymore since they're in the modal
});

document.getElementById('settingsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Clear all previous errors
    clearAllErrors();
    
    // Disable submit button
    const submitBtn = this.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.disabled = true;
    submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Saving...';
    
    const formData = new FormData(this);
    
    fetch(this.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json',
        }
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(data => {
                throw { status: response.status, data: data };
            });
        }
        return response.json();
    })
    .then(data => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        
        if (data.success) {
            showToast(data.message, 'success');
            clearAllErrors();
            
            // Reload page after 1.5 seconds
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        } else if (data.errors) {
            Object.keys(data.errors).forEach(fieldName => {
                const errorMessages = data.errors[fieldName];
                showFieldError(fieldName, errorMessages[0]);
            });
            
            const firstError = Object.values(data.errors)[0][0];
            showToast(firstError, 'error');
        } else if (data.message) {
            showToast(data.message, 'error');
        }
    })
    .catch(error => {
        submitBtn.disabled = false;
        submitBtn.innerHTML = originalText;
        
        if (error.status === 422 && error.data && error.data.errors) {
            Object.keys(error.data.errors).forEach(fieldName => {
                const errorMessages = error.data.errors[fieldName];
                showFieldError(fieldName, errorMessages[0]);
            });
            const firstError = Object.values(error.data.errors)[0][0];
            showToast(firstError, 'error');
        } else if (error.data && error.data.message) {
            showToast(error.data.message, 'error');
        } else {
            showToast('An error occurred while saving settings', 'error');
        }
    });
});

function showFieldError(fieldName, errorMessage) {
    const errorElement = document.querySelector(`.error-message[data-field="${fieldName}"]`);
    if (errorElement) {
        errorElement.textContent = errorMessage;
        errorElement.classList.remove('hidden');
    }
    
    const inputElement = document.querySelector(`[name="${fieldName}"]`);
    if (inputElement) {
        inputElement.classList.add('border-red-500', 'focus:ring-red-500');
        inputElement.classList.remove('border-gray-300', 'focus:ring-primary-500');
    }
}

function clearAllErrors() {
    document.querySelectorAll('.error-message').forEach(el => {
        el.classList.add('hidden');
        el.textContent = '';
    });
    
    document.querySelectorAll('input, textarea').forEach(el => {
        el.classList.remove('border-red-500', 'focus:ring-red-500');
        el.classList.add('border-gray-300', 'focus:ring-primary-500');
    });
}

document.querySelectorAll('input, textarea').forEach(input => {
    input.addEventListener('input', function() {
        const fieldName = this.getAttribute('name');
        const errorElement = document.querySelector(`.error-message[data-field="${fieldName}"]`);
        if (errorElement && !errorElement.classList.contains('hidden')) {
            errorElement.classList.add('hidden');
            errorElement.textContent = '';
            this.classList.remove('border-red-500', 'focus:ring-red-500');
            this.classList.add('border-gray-300', 'focus:ring-primary-500');
        }
    });
});
</script>
@endsection
