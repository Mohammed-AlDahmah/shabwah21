<template>
  <div v-if="loading" class="loading-overlay">
    <div class="loading-container">
      <!-- خلفية متحركة -->
      <div class="animated-background">
        <div class="bg-circle circle-1"></div>
        <div class="bg-circle circle-2"></div>
        <div class="bg-circle circle-3"></div>
      </div>
      
      <!-- اللوجو مع تأثير التمزق المحسن -->
      <div class="logo-container">
        <div class="logo-pieces">
          <div class="logo-piece piece-1"></div>
          <div class="logo-piece piece-2"></div>
          <div class="logo-piece piece-3"></div>
          <div class="logo-piece piece-4"></div>
          <div class="logo-piece piece-5"></div>
          <div class="logo-piece piece-6"></div>
          <div class="logo-piece piece-7"></div>
          <div class="logo-piece piece-8"></div>
        </div>
        <div class="logo-glow"></div>
        <img 
          src="/images/logo-view-line.jpg" 
          alt="ViewLine Logo" 
          class="logo-main"
        />
      </div>
      
      <!-- النص المحسن -->
      <div class="loading-text">
        <span class="loading-dots">
          جاري التحميل
          <span class="dot">.</span>
          <span class="dot">.</span>
          <span class="dot">.</span>
        </span>
      </div>
      
      <!-- شريط التقدم المحسن -->
      <div class="progress-container">
        <div class="progress-bar">
          <div class="progress-fill" :style="{ width: progress + '%' }"></div>
          <div class="progress-glow"></div>
        </div>
        <div class="progress-text">{{ Math.round(progress) }}%</div>
      </div>
      
      <!-- تأثيرات إضافية -->
      <div class="particles">
        <div class="particle" v-for="n in 6" :key="n" :class="`particle-${n}`"></div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted, onUnmounted, watch } from 'vue';

const props = defineProps({
  loading: {
    type: Boolean,
    default: false
  }
});

const progress = ref(0);
let progressInterval = null;

onMounted(() => {
  if (props.loading) {
    startProgress();
  }
});

onUnmounted(() => {
  if (progressInterval) {
    clearInterval(progressInterval);
  }
});

watch(() => props.loading, (newValue) => {
  if (newValue) {
    startProgress();
  } else {
    stopProgress();
  }
});

const startProgress = () => {
  progress.value = 0;
  progressInterval = setInterval(() => {
    if (progress.value < 90) {
      progress.value += Math.random() * 12 + 3;
    }
  }, 150);
};

const stopProgress = () => {
  if (progressInterval) {
    clearInterval(progressInterval);
  }
  progress.value = 100;
  setTimeout(() => {
    progress.value = 0;
  }, 500);
};
</script>

<style scoped>
.loading-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(135deg, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.7));
  backdrop-filter: blur(10px);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  animation: fadeIn 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.loading-container {
  position: relative;
  text-align: center;
  color: white;
  background: linear-gradient(145deg, rgba(15, 23, 42, 0.95), rgba(30, 41, 59, 0.9));
  border-radius: 24px;
  padding: 3rem 2rem;
  box-shadow: 
    0 25px 50px rgba(0, 0, 0, 0.4),
    0 0 0 1px rgba(255, 255, 255, 0.1),
    inset 0 1px 0 rgba(255, 255, 255, 0.1);
  max-width: 320px;
  min-width: 300px;
  overflow: hidden;
}

/* خلفية متحركة */
.animated-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  overflow: hidden;
  z-index: 0;
}

.bg-circle {
  position: absolute;
  border-radius: 50%;
  background: linear-gradient(45deg, rgba(59, 130, 246, 0.1), rgba(16, 185, 129, 0.1));
  animation: float 6s ease-in-out infinite;
}

.circle-1 {
  width: 100px;
  height: 100px;
  top: -20px;
  right: -20px;
  animation-delay: 0s;
}

.circle-2 {
  width: 60px;
  height: 60px;
  bottom: -10px;
  left: -10px;
  animation-delay: 2s;
}

.circle-3 {
  width: 80px;
  height: 80px;
  top: 50%;
  left: -40px;
  animation-delay: 4s;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
    opacity: 0.3;
  }
  50% {
    transform: translateY(-20px) rotate(180deg);
    opacity: 0.6;
  }
}

/* حاوية اللوجو */
.logo-container {
  position: relative;
  width: 90px;
  height: 90px;
  margin: 0 auto 25px;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 10;
}

/* اللوجو الرئيسي */
.logo-main {
  width: 70px;
  height: 70px;
  object-fit: contain;
  border-radius: 50%;
  position: relative;
  z-index: 15;
  animation: logoShake 0.6s ease-in-out infinite;
  box-shadow: 
    0 0 30px rgba(59, 130, 246, 0.5),
    0 0 60px rgba(59, 130, 246, 0.2);
  filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
}

.logo-glow {
  position: absolute;
  width: 100px;
  height: 100px;
  background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, transparent 70%);
  border-radius: 50%;
  animation: glowPulse 2s ease-in-out infinite;
}

@keyframes glowPulse {
  0%, 100% {
    opacity: 0.5;
    transform: scale(1);
  }
  50% {
    opacity: 0.8;
    transform: scale(1.1);
  }
}

/* قطع اللوجو المتمزقة المحسنة */
.logo-pieces {
  position: absolute;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
}

.logo-piece {
  position: absolute;
  width: 22px;
  height: 22px;
  background: linear-gradient(45deg, #3b82f6, #10b981, #f59e0b, #8b5cf6);
  border-radius: 6px;
  animation: pieceFloat 3s ease-in-out infinite;
  box-shadow: 
    0 0 15px rgba(59, 130, 246, 0.7),
    0 4px 8px rgba(0, 0, 0, 0.2);
  backdrop-filter: blur(5px);
}

.piece-1 {
  top: -15px;
  left: 50%;
  transform: translateX(-50%);
  animation-delay: 0s;
}

.piece-2 {
  top: 50%;
  right: -15px;
  transform: translateY(-50%);
  animation-delay: 0.3s;
}

.piece-3 {
  bottom: -15px;
  left: 50%;
  transform: translateX(-50%);
  animation-delay: 0.6s;
}

.piece-4 {
  top: 50%;
  left: -15px;
  transform: translateY(-50%);
  animation-delay: 0.9s;
}

.piece-5 {
  top: 25%;
  right: -8px;
  animation-delay: 0.15s;
}

.piece-6 {
  bottom: 25%;
  left: -8px;
  animation-delay: 0.45s;
}

.piece-7 {
  top: -8px;
  left: 25%;
  animation-delay: 0.75s;
}

.piece-8 {
  bottom: -8px;
  right: 25%;
  animation-delay: 1.05s;
}

/* انيميشن هز اللوجو المحسن */
@keyframes logoShake {
  0%, 100% {
    transform: translateX(0) rotate(0deg) scale(1);
  }
  25% {
    transform: translateX(-3px) rotate(-1deg) scale(1.02);
  }
  75% {
    transform: translateX(3px) rotate(1deg) scale(1.02);
  }
}

/* انيميشن طفو القطع المحسن */
@keyframes pieceFloat {
  0%, 100% {
    transform: translate(0, 0) rotate(0deg) scale(1);
    opacity: 0.9;
  }
  25% {
    transform: translate(-8px, -8px) rotate(90deg) scale(1.15);
    opacity: 1;
  }
  50% {
    transform: translate(8px, -15px) rotate(180deg) scale(1.25);
    opacity: 0.95;
  }
  75% {
    transform: translate(-5px, -5px) rotate(270deg) scale(1.15);
    opacity: 1;
  }
}

/* النص المحسن */
.loading-text {
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 25px;
  color: #f8fafc;
  text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
  position: relative;
  z-index: 10;
}

.loading-dots {
  display: inline-block;
  background: linear-gradient(45deg, #3b82f6, #10b981);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
}

.dot {
  animation: dotPulse 1.6s infinite;
  opacity: 0.4;
  font-weight: bold;
  margin-left: 2px;
}

.dot:nth-child(2) {
  animation-delay: 0.2s;
}

.dot:nth-child(3) {
  animation-delay: 0.4s;
}

.dot:nth-child(4) {
  animation-delay: 0.6s;
}

@keyframes dotPulse {
  0%, 20% {
    opacity: 0.4;
    transform: scale(1);
  }
  50% {
    opacity: 1;
    transform: scale(1.2);
  }
  100% {
    opacity: 0.4;
    transform: scale(1);
  }
}

/* شريط التقدم المحسن */
.progress-container {
  position: relative;
  z-index: 10;
}

.progress-bar {
  width: 220px;
  height: 6px;
  background: rgba(255, 255, 255, 0.1);
  border-radius: 3px;
  overflow: hidden;
  margin: 0 auto 10px;
  box-shadow: 
    inset 0 2px 4px rgba(0, 0, 0, 0.3),
    0 1px 0 rgba(255, 255, 255, 0.1);
  position: relative;
}

.progress-fill {
  height: 100%;
  background: linear-gradient(90deg, #3b82f6, #10b981, #f59e0b, #8b5cf6, #ec4899);
  border-radius: 3px;
  transition: width 0.3s ease-out;
  box-shadow: 0 0 12px rgba(59, 130, 246, 0.6);
  position: relative;
}

.progress-glow {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 20px;
  background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
  animation: progressGlow 2s ease-in-out infinite;
}

@keyframes progressGlow {
  0% {
    transform: translateX(-100%);
  }
  100% {
    transform: translateX(400%);
  }
}

.progress-text {
  font-size: 14px;
  font-weight: 600;
  color: #cbd5e1;
  text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

/* الجزيئات المتحركة */
.particles {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  pointer-events: none;
  z-index: 5;
}

.particle {
  position: absolute;
  width: 4px;
  height: 4px;
  background: linear-gradient(45deg, #3b82f6, #10b981);
  border-radius: 50%;
  animation: particleFloat 4s ease-in-out infinite;
}

.particle-1 {
  top: 20%;
  left: 10%;
  animation-delay: 0s;
}

.particle-2 {
  top: 60%;
  right: 15%;
  animation-delay: 0.5s;
}

.particle-3 {
  bottom: 30%;
  left: 20%;
  animation-delay: 1s;
}

.particle-4 {
  top: 40%;
  right: 25%;
  animation-delay: 1.5s;
}

.particle-5 {
  bottom: 20%;
  right: 10%;
  animation-delay: 2s;
}

.particle-6 {
  top: 80%;
  left: 30%;
  animation-delay: 2.5s;
}

@keyframes particleFloat {
  0%, 100% {
    transform: translateY(0px) scale(1);
    opacity: 0.6;
  }
  50% {
    transform: translateY(-30px) scale(1.5);
    opacity: 1;
  }
}

/* تأثيرات إضافية */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: scale(0.8) translateY(20px);
  }
  to {
    opacity: 1;
    transform: scale(1) translateY(0);
  }
}

/* تأثيرات للشاشات الصغيرة */
@media (max-width: 768px) {
  .loading-container {
    padding: 2rem 1.5rem;
    max-width: 280px;
    min-width: 260px;
  }
  
  .logo-container {
    width: 80px;
    height: 80px;
  }
  
  .logo-main {
    width: 60px;
    height: 60px;
  }
  
  .logo-piece {
    width: 18px;
    height: 18px;
  }
  
  .loading-text {
    font-size: 16px;
  }
  
  .progress-bar {
    width: 200px;
  }
  
  .bg-circle {
    display: none;
  }
}

/* تأثيرات للشاشات الكبيرة */
@media (min-width: 1024px) {
  .loading-container {
    padding: 3.5rem 2.5rem;
    max-width: 380px;
    min-width: 350px;
  }
  
  .logo-container {
    width: 100px;
    height: 100px;
  }
  
  .logo-main {
    width: 80px;
    height: 80px;
  }
  
  .logo-piece {
    width: 28px;
    height: 28px;
  }
  
  .loading-text {
    font-size: 20px;
  }
  
  .progress-bar {
    width: 240px;
  }
}

/* تأثيرات إضافية للتفاعل */
.loading-overlay:hover .logo-main {
  animation-duration: 0.4s;
  box-shadow: 
    0 0 40px rgba(59, 130, 246, 0.7),
    0 0 80px rgba(59, 130, 246, 0.3);
}

.loading-overlay:hover .logo-piece {
  animation-duration: 2s;
}

.loading-overlay:hover .progress-fill {
  box-shadow: 0 0 20px rgba(59, 130, 246, 0.8);
}

/* تأثيرات للوضع المظلم */
@media (prefers-color-scheme: dark) {
  .loading-container {
    background: linear-gradient(145deg, rgba(0, 0, 0, 0.95), rgba(15, 23, 42, 0.9));
  }
}

/* تحسين الأداء */
.loading-overlay {
  will-change: transform, opacity;
}

.logo-main, .logo-piece, .progress-fill {
  will-change: transform;
}
</style>